#include <WiFi.h>
#include <HTTPClient.h>
#include <SPI.h>
#include <MFRC522.h>
#include <TinyGPSPlus.h>
#include <LiquidCrystal_I2C.h>
#include <Wire.h>

// ===== WiFi Settings =====
const char* ssid = "Asdf";            // Replace with your WiFi SSID
const char* password = "1212121212";  // Replace with your WiFi Password

// ===== Server Endpoints (Mock URLs) =====
const char* gpsServerURL = "https://cbms.hostfree.co/api/updateCoordinates";
const char* rfidServerURL = "https://cbms.hostfree.co/api/c";

// ===== 16x2 LCD Display Settings =====
LiquidCrystal_I2C lcd(0x27, 16, 2);

// ===== Custom I2C Pins for LCD =====
#define I2C_SDA 26  // Use GPIO26 for SDA
#define I2C_SCL 27  // Use GPIO27 for SCL

// ===== Buzzer & LED Settings =====
#define BUZZER_PIN 32
#define RED_LED_PIN 33
#define GREEN_LED_PIN 25

// ===== RC522 RFID Module Settings =====
#define RST_PIN 22  // Reset pin for RC522
#define SS_PIN 5    // Slave Select (SDA) pin for RC522
MFRC522 mfrc522(SS_PIN, RST_PIN);

// ===== GPS Module Settings =====
// Using HardwareSerial (UART2) for GPS. Connect GPS TX to ESP32 GPIO4.
HardwareSerial gpsSerial(2);
const uint32_t GPSBaud = 9600;  // Typical baud rate for Neo-6M
TinyGPSPlus gps;

// Global variables for GPS data
double currentLat = 0.0;
double currentLng = 0.0;
bool fixAvailable = false;

// Global variables for RFID display (to show RFID and displaying error for a short period)
String lastRFID = "";
unsigned long lastRFIDTime = 0;  // Time when RFID was last updated
String cardStatus = "";          // To store "Invalid User" or "User Valid"

// Timing variables for sending GPS data every 10 seconds
unsigned long previousGpsMillis = 0;
const long gpsInterval = 30000;  // 30 seconds

// Timing variables for updating LCD display
unsigned long lastLCDUpdate = 0;
const unsigned long lcdUpdateRate = 4000;  // Update every 4 seconds

// ===== Beep Notification Function =====
void buzzer(int n, bool initialBeep = false) {
  digitalWrite(RED_LED_PIN, HIGH);  // Turn Red LED on
  if (initialBeep) {
    // Short single beep for detection
    digitalWrite(BUZZER_PIN, HIGH);
    delay(50);  // Short 50ms beep
    digitalWrite(BUZZER_PIN, LOW);
  } else {
    Serial.println("Inside Buzzer else function");
    // Validation beeps
    for (int i = 1; i <= n; i++) {
      // tone(BUZZER_PIN, 1400);  // Use your loudest frequency (e.g., 2700 Hz)
      digitalWrite(BUZZER_PIN, HIGH);
      if (n > 1) {
        delay(50);  // Short beep for multiple
      } else {
        delay(100);  // Longer beep for single
      }
      // noTone(BUZZER_PIN);
      digitalWrite(BUZZER_PIN, LOW);
      if (n > 1) {
        delay(150);  // Pause between beeps
      }
    }
    // Blink LCD backlight 4 times (2 seconds total)
    for (int i = 0; i < 4; i++) {
      lcd.noBacklight();
      delay(250);
      lcd.backlight();
      delay(250);
    }
  }
  digitalWrite(RED_LED_PIN, LOW);  // Turn LED off
}

// ===== Display Update Function =====
// This function mimics the display logic of the provided code sample.
// It shows branding + WiFi status on line 1 and dynamic data on line 2.
void updateLCD() {
  lcd.clear();

  // If an RFID card was scanned within the last 5 seconds, show its status on line 1 only
  if (lastRFID != "" && (millis() - lastRFIDTime < 5000)) {
    String statusMsg = cardStatus;  // "Invalid User" or "User Valid", "Error", etc.
    if (statusMsg.length() > 16) {
      statusMsg = statusMsg.substring(0, 16);
    }
    lcd.setCursor(0, 0);
    lcd.print(statusMsg);
  } else {
    // Turn off green LED when RFID status is no longer displayed
    digitalWrite(GREEN_LED_PIN, LOW);

    // Line 1: Branding and WiFi status
    String line1 = "BusTracker ";
    if (WiFi.status() == WL_CONNECTED) {
      line1 += "WiFi";
    } else {
      line1 += "NoWiFi";
    }
    // Ensure we don't exceed 16 characters
    if (line1.length() > 16) {
      line1 = line1.substring(0, 16);
    }
    lcd.setCursor(0, 0);
    lcd.print(line1);

    // Line 2: If an RFID card was scanned within the last 5 seconds, show its status;
    // otherwise, show GPS info.
    lcd.setCursor(0, 1);
    if (fixAvailable) {
      // Display GPS latitude (truncated to 2 decimals) for brevity
      String gpsMsg = "Lat:" + String(currentLat, 2);
      if (gpsMsg.length() > 16) {
        gpsMsg = gpsMsg.substring(0, 16);
      }
      lcd.print(gpsMsg);
    } else {
      lcd.print("No GPS fix");
    }
  }
}

void setup() {

  // Initialize and set Buzzer & LED
  pinMode(BUZZER_PIN, OUTPUT);
  pinMode(RED_LED_PIN, OUTPUT);
  pinMode(GREEN_LED_PIN, OUTPUT);
  digitalWrite(RED_LED_PIN, LOW);
  digitalWrite(GREEN_LED_PIN, LOW);

  Serial.begin(115200);
  delay(1000);

  // Initialize LCD
  Wire.begin(I2C_SDA, I2C_SCL);
  lcd.init();
  lcd.backlight();
  lcd.clear();
  lcd.setCursor(0, 0);
  lcd.print("System Starting");

  Serial.println("ESP32 Bus Tracking & Fee Payment System Starting...");

  // Connect to WiFi
  lcd.setCursor(0, 1);
  lcd.print("Connecting WiFi");
  WiFi.begin(ssid, password);
  Serial.print("Connecting to WiFi");
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  Serial.println();
  Serial.print("Connected! IP: ");
  Serial.println(WiFi.localIP());

  // Show WiFi connection on LCD and beep
  lcd.clear();
  lcd.setCursor(0, 0);
  lcd.print("WiFi Connected");
  lcd.setCursor(0, 1);
  lcd.print(WiFi.localIP());
  buzzer(1);  // Single beep on startup
  delay(1000);

  // Initialize RC522 RFID reader
  SPI.begin();  // Uses default SPI pins: SCK=GPIO18, MISO=GPIO19, MOSI=GPIO23
  mfrc522.PCD_Init();
  Serial.println("RC522 RFID reader initialized.");

  // Initialize GPS module using HardwareSerial on UART2
  // GPS TX is connected to ESP32 GPIO4; unused TX parameter set to -1.
  gpsSerial.begin(GPSBaud, SERIAL_8N1, 4, -1);
  Serial.println("GPS module initialized on UART2 (RX pin: 4).");

  // Final initialization message on LCD
  lcd.clear();
  lcd.setCursor(0, 0);
  lcd.print("Init Complete");
  delay(1000);
  lcd.clear();
  lastLCDUpdate = millis();
}

void loop() {
  // Process incoming GPS data
  while (gpsSerial.available() > 0) {
    char c = gpsSerial.read();
    gps.encode(c);
    if (gps.location.isUpdated()) {
      currentLat = gps.location.lat();
      currentLng = gps.location.lng();
      fixAvailable = true;
    }
  }

  // Periodically send GPS data every 30 seconds
  unsigned long currentMillis = millis();
  if (currentMillis - previousGpsMillis >= gpsInterval) {
    previousGpsMillis = currentMillis;
    sendGPSData();
  }

  // Check for RFID card detection
  if (mfrc522.PICC_IsNewCardPresent()) {
    if (mfrc522.PICC_ReadCardSerial()) {
      String rfidUID = "";
      for (byte i = 0; i < mfrc522.uid.size; i++) {
        rfidUID += (mfrc522.uid.uidByte[i] < 0x10 ? "0" : "");
        rfidUID += String(mfrc522.uid.uidByte[i], HEX);
      }
      rfidUID.toUpperCase();
      Serial.print("RFID Card detected, UID: ");
      Serial.println(rfidUID);

      // Immediate feedback: Short beep and red LED flash to confirm card read
      buzzer(1, true);  // Single short beep for detection

      // Save RFID info globally so updateLCD() can display it for 5 seconds
      lastRFID = rfidUID;
      lastRFIDTime = millis();
      sendRFIDData(rfidUID);

      // Halt the card to allow new scans
      mfrc522.PICC_HaltA();
    }
  }

  // Update the LCD every lcdUpdateRate milliseconds
  if (millis() - lastLCDUpdate >= lcdUpdateRate) {
    updateLCD();
    lastLCDUpdate = millis();
  }
}

// ===== Function to Send GPS Data =====
void sendGPSData() {
  if (fixAvailable) {
    Serial.print("Sending GPS -> Lat: ");
    Serial.print(currentLat, 6);
    Serial.print(" Lng: ");
    Serial.println(currentLng, 6);

    // Create JSON payload
    String payload = "{\"latitude\":" + String(currentLat, 6) + ",\"longitude\":" + String(currentLng, 6) + "}";

    // Turn off green LED at the start of a new scan
    digitalWrite(GREEN_LED_PIN, LOW);

    if (WiFi.status() == WL_CONNECTED) {
      HTTPClient http;
      http.begin(gpsServerURL);
      http.addHeader("Content-Type", "application/json");
      int httpResponseCode = http.POST(payload);
      if (httpResponseCode > 0) {
        Serial.print("GPS POST Response: ");
        Serial.println(httpResponseCode);
        String response = http.getString();
        Serial.println("Response: " + response);
      } else {
        Serial.print("Error sending GPS: ");
        Serial.println(http.errorToString(httpResponseCode).c_str());
      }
      http.end();
    } else {
      Serial.println("WiFi not connected.");
    }
  } else {
    Serial.println("No GPS fix available.");
  }
}

// ===== Function to Send RFID Data using GET request =====
void sendRFIDData(String uid) {
  Serial.print("Sending GET request with bus id 1 and card token: ");
  Serial.println(uid);

  // Construct URL with query parameters
  String url = String(rfidServerURL) + "?b=1&c=" + uid;

  if (WiFi.status() == WL_CONNECTED) {
    HTTPClient http;
    http.begin(url);  // Use the complete URL for the GET request
    int httpResponseCode = http.GET();
    if (httpResponseCode > 0) {
      Serial.print("GET Response code: ");
      Serial.println(httpResponseCode);
      String response = http.getString();
      Serial.println("Response: " + response);

      // Parse JSON-like response
      if (response.indexOf("Card validated successfully") != -1) {
        cardStatus = "User Valid";
        buzzer(1);  // One longer beep for valid
        digitalWrite(GREEN_LED_PIN, HIGH);
      } else if (response.indexOf("Card not assigned") != -1) {
        cardStatus = "Invalid User";
        buzzer(2);  // Two short beeps for invalid
      } else {
        cardStatus = "Error";  // Fallback for unexpected response
        buzzer(3);             // Three beeps for error
      }

    } else {
      Serial.print("Error on GET: ");
      Serial.println(http.errorToString(httpResponseCode).c_str());
      cardStatus = "Server Error";
      buzzer(3);  // Three beeps for server error
    }
    http.end();
  } else {
    Serial.println("WiFi not connected.");
    cardStatus = "No WiFi";
    buzzer(3);  // Three beeps for no WiFi
  }

  // Immediately update the LCD with the new cardStatus
  updateLCD();
  lastLCDUpdate = millis();
}