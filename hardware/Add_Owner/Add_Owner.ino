#include <SPI.h>
#include <MFRC522.h>
#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <ArduinoJson.h>

#define RST_PIN 0
#define SS_PIN 2
MFRC522 mfrc522(SS_PIN, RST_PIN);

const int buzz = 5; 
const int relay = 4;

int Led_OnBoard = 2;

const char* ssid = "TEPI";
const char* password = "12344321";

String params = "";
String method = "POST"; 
String host = "tepi.rizalscompanylab.my.id";
String base_url = "http://" + host + "/room/add_owner";

StaticJsonDocument<192> doc;

void setup() {
  Serial.begin(115200);
  pinMode(Led_OnBoard, OUTPUT);
  pinMode(relay, OUTPUT);
  digitalWrite(relay, HIGH);
  pinMode(buzz, OUTPUT);
  digitalWrite(buzz, LOW);
  SPI.begin();
  mfrc522.PCD_Init();
  WiFi.mode(WIFI_STA);
  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED) {
    digitalWrite(buzz, HIGH);
    Serial.print("Connecting to Wi-Fi");
    delay(70);
    digitalWrite(buzz, LOW);
    for (int i = 0; i < 5; i++) {
      Serial.print(".");
      delay(250);
    }
    Serial.println(".");
  }
  Serial.println("Connected to Network/SSID");
  Serial.print("IP address: ");
  Serial.println(WiFi.localIP());
  buzzer(4, 30, true);
}

void loop() {

  if (!mfrc522.PICC_IsNewCardPresent()) {
    Serial.println("belum terdeteksi");
    delay(50);
    return;
  }
  if (!mfrc522.PICC_ReadCardSerial()) {
    Serial.println("kartu terdeteksi : sedang membaca");
    delay(50);
    return;
  }

  String guid;
  String content = "";
  byte letter;

  for (byte i = 0; i < mfrc522.uid.size; i++) {
    content.concat(String(mfrc522.uid.uidByte[i] < 0x10 ? " 0" : " "));
    content.concat(String(mfrc522.uid.uidByte[i], HEX));
  }

  Serial.println();
  content.toUpperCase();
  guid = content.substring(1);
  guid.replace(" ", "");
  Serial.println(guid);
  params = "{\"rfid_user\":\"" + guid + "\"}";

  Serial.println("Req dATAA: " + params);
  buzzer(1, 100, true);

  request(method, base_url, params);
}


void request(String method, String base_url, String data) {

  if (WiFi.status() != WL_CONNECTED) {
    while (WiFi.status() != WL_CONNECTED) {
      digitalWrite(buzz, HIGH);
      Serial.print("Connecting to Wi-Fi");
      delay(70);
      digitalWrite(buzz, LOW);
      for (int i = 0; i < 5; i++) {
        Serial.print(".");
        delay(250);
      }
      Serial.println(".");
    }
    buzzer(4, 30, true);
  }

  HTTPClient http;
  WiFiClient client;
  http.begin(client, base_url);
  http.addHeader("Content-Type", "application/application/json");
  int httpCode;
  if (method == "POST") {
    httpCode = http.POST(data);
  } else if (method == "GET") {
    httpCode = http.GET();
  } else {
    Serial.println("Metode request tidak valid: " + method);
    return;
  }

  if (httpCode > 0) {
    if (httpCode == HTTP_CODE_OK) {
      String payload = http.getString();
      Serial.println("Respons JSON:");
      Serial.println(payload);
    } else {
      String payload = http.getString();
      Serial.print("Gagal request: ");
      Serial.println(httpCode);
      Serial.println(payload);
    }
  } else {
    Serial.println("Koneksi ke server gagal.");
  }

  String payload = http.getString();

  if (payload.length() > 0) {
    DeserializationError error = deserializeJson(doc, payload);

    if (error) {
      Serial.print(F("deserializeJson() failed: "));
      Serial.println(error.f_str());
    } else {
      if (doc.containsKey("message")) {
        bool access = doc["data"]["access"];
        Serial.println("JSON - access:");
        Serial.println(access);
        if (access == true) {
          digitalWrite(relay, LOW);
          buzzer(1, 100, true);
          delay(3000);
          digitalWrite(relay, HIGH);
        } else {
          buzzer(5, 100, true);
        }
      } else {
        buzzer(20, 100, true);
        Serial.println("JSON: \"access\" key not found");
      }
    }
  } else {
    buzzer(1, 1500, true);
    Serial.println("Failed to retrieve payload from HTTP request");
  }

  http.end();
}

void buzzer(int banyakLoop, int timeDelay, bool polarity) {
  for (int i = 1; i <= banyakLoop; i++) {
    digitalWrite(buzz, polarity ? HIGH : LOW);
    delay(timeDelay);
    digitalWrite(buzz, !polarity ? HIGH : LOW);
    delay(timeDelay);
  }
}
