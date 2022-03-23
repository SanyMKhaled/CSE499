#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <WiFiClient.h>
WiFiClient WifiClient;

#include <Wire.h>
#include "HX711.h"

#define calibration_factor -7000 //This value is obtained using the SparkFun_HX711_Calibration sketch

#define LOADCELL_DOUT_PIN  D6
#define LOADCELL_SCK_PIN  D5

HX711 scale;
const char* ssid     = "Sany";
const char* password = "Sany6242822";
const char* serverName = "http://192.168.1.102/499B/post-esp-data.php";
// Example: http://xxx.com/esp_hcsr04_php_post.php
String apiKeyValue ="abc";
// Example: tPmAT5Ab3j7F9
String sensorName = "1";
String sensorLocation = "Gazipur";
void setup() {
  Serial.begin(9600);
  WiFi.begin(ssid, password);
  Serial.println("Connecting");
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  Serial.println("");
  Serial.print("Connected to WiFi network with IP Address: ");
  Serial.println(WiFi.localIP());
  
  scale.begin(LOADCELL_DOUT_PIN, LOADCELL_SCK_PIN);
  scale.set_scale(calibration_factor); //This value is obtained by using the SparkFun_HX711_Calibration sketch
  scale.tare(); //Assuming there is no weight on the scale at start up, reset the scale to 0

  Serial.println("Readings:");
  delay(500);
}
void loop() {
    if (WiFi.status() == WL_CONNECTED) {
    HTTPClient http;
    http.begin(WifiClient,serverName);

    http.addHeader("Content-Type", "application/x-www-form-urlencoded");

    // Prepare your HTTP POST request data
    String httpRequestData = "api_key=" + apiKeyValue + "&sensor=" + sensorName + "&location=" + sensorLocation + "&weight=" + String(scale.get_units(),1) + "";
    Serial.print("httpRequestData: ");
    Serial.println(httpRequestData);
    // Send HTTP POST request
    int httpResponseCode = http.POST(httpRequestData);

    if (httpResponseCode > 0) {
      Serial.print("HTTP Response code: ");
      Serial.println(httpResponseCode);
    }
    else {
      Serial.print("Error code: ");
      Serial.println(httpResponseCode);
    }
     
    // Free resources
    http.end();
  }
  else {
    Serial.println("WiFi Disconnected");
  }
  delay(2000);
}
