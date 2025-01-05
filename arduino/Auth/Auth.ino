#include <SPI.h>
#include <MFRC522.h>

#define RST_PIN 9
#define SS_PIN 10
#define BUZZER_PIN 8

MFRC522 rfid(SS_PIN, RST_PIN);

void buzzer(int n) {
  for (int i = 1; i <= n; i++) {
    digitalWrite(BUZZER_PIN, HIGH);
    if (n > 1) {
      delay(20);
    } else {
      delay(50);
    }
    digitalWrite(BUZZER_PIN, LOW);
    if (n > 1) {
      delay(100);
    }
  }
}

void setup() {
  Serial.begin(9600);
  SPI.begin();
  rfid.PCD_Init();
  delay(4);
  Serial.println("Hold your card closer to reader...");
  pinMode(BUZZER_PIN, OUTPUT);
}

void loop() {
  if (!rfid.PICC_IsNewCardPresent()) {
    return;
  }
  if (!rfid.PICC_ReadCardSerial()) {
    return;
  }
  buzzer(1);
  Serial.print("Card ID: ");
  String cardID = "";
  for (byte i =0; i < rfid.uid.size; i++ ) {
    Serial.print(rfid.uid.uidByte[i] < 0x10 ? " 0" : " ");
    Serial.print(rfid.uid.uidByte[i], HEX);
    cardID.concat(String(rfid.uid.uidByte[i] < 0x10 ? " 0" : " "));
    cardID.concat(String(rfid.uid.uidByte[i], HEX));
  }
  Serial.println();
  
  cardID.toUpperCase();
  if (cardID.substring(1) == "E3 B9 CD C9") {
    buzzer(1);
    Serial.println("Access Granted, Welcome!");
    Serial.println();
    delay(3000);
  }
  else {
    Serial.println("Access Denied. Unauthorized card.");
    Serial.println();
    buzzer(2);
    delay(3000);
  }

}

