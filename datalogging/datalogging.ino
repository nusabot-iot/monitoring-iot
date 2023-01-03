#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <WiFiClient.h>
#include <NusabotSimpleTimer.h>

NusabotSimpleTimer timer;
WiFiClient client;
HTTPClient http;

const char* ssid = "follow_at_nusabot";
const char* password = "yaterserah";

String serverName = "http://192.168.43.207/monitoring/";
int pot, last_pot;

void kirimData() {
  if (WiFi.status() == WL_CONNECTED) {

    if (pot != last_pot) {
      last_pot = pot;
      
      String serverPath = serverName + "adddata.php?serialnumber=" + ESP.getChipId() + "&sensor=pot&data=" + String(pot);
      http.begin(client, serverPath.c_str());

      int httpResponseCode = http.GET();

      if (httpResponseCode > 0) {
        Serial.print("Kode Respon: ");
        Serial.println(httpResponseCode);
        String payload = http.getString();
        Serial.println(payload);
      } else {
        Serial.print("Error Code: ");
        Serial.println(httpResponseCode);
      }

      http.end();
    }

  } else {
    Serial.println("WiFi Terputus");
  }
}

void setup() {
  Serial.begin(115200);

  WiFi.begin(ssid, password);
  Serial.println("Menghubungkan ke WiFi");
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }

  Serial.print("Terhubung ke WiFi dengan IP Address: ");
  Serial.println(WiFi.localIP());

  timer.setInterval(2000, kirimData);
}

void loop() {
  timer.run();
  pot = analogRead(A0);
}
