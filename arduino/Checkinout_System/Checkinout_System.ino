#include <SPI.h>
#include <MFRC522.h>

#define RST_PIN 9
#define SS_PIN 10
#define BUZZER_PIN 8

MFRC522 rfid(SS_PIN, RST_PIN);

String checkedInUsers[10];
int userCount;

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

void checkIn(String cardID) {
  if (userCount < 10) {
    checkedInUsers[userCount] = cardID;
    userCount++;
    buzzer(1);
    Serial.println(" -> Checked in...");
    displayCheckedInUsers();
  } else {
    Serial.print("User limit reached!");
  }
}

void checkOut(int index) {
  buzzer(2);
  Serial.println(" -> Checked out...");

  for (int i = index; i < userCount - 1; i++) {
    checkedInUsers[i] = checkedInUsers[i + 1];
  }
  userCount--;

  displayCheckedInUsers();
}

int findCard(String cardID) {
  for (int i = 0; i < userCount; i++) {
    if (checkedInUsers[i] == cardID) {
      return i;
    }
  }
  return -1;
}

void displayCheckedInUsers() {
  Serial.println();
  Serial.clearWriteError();
  Serial.println("Current Users:");
  for (int i = 0; i < userCount; i++) {
    Serial.println(checkedInUsers[i]);
  }
  if (userCount == 0) {
    Serial.println("No users checked in.");
  }
  Serial.println();
}

void setup() {
  Serial.begin(9600);
  SPI.begin();
  rfid.PCD_Init();
  delay(4);
  Serial.println("Hold your card closer to reader...");
  pinMode(BUZZER_PIN, OUTPUT);
  displayCheckedInUsers();
}

void loop() {
  if (!rfid.PICC_IsNewCardPresent() || !rfid.PICC_ReadCardSerial()) {
    return;
  }

  String cardID = "";
  for (byte i = 0; i < rfid.uid.size; i++) {
    cardID += String(rfid.uid.uidByte[i], HEX);
  }

  cardID.toUpperCase();

  Serial.print("Card ID: ");
  Serial.print(cardID);


  if (cardID == "E3B9CDC9") {
    Serial.println(" -> Entry restricted!!!");
    buzzer(5);
    displayCheckedInUsers();
    return;
  } else if (cardID == "819EBCC" && (findCard(cardID)== -1)) {
    Serial.print(" -> Admin User, Welcome Ashish");
    buzzer(10);
  }

  int index = findCard(cardID);
  if (index == -1) {
    checkIn(cardID);
  } else {
    checkOut(index);
  }
  delay(1000);
}