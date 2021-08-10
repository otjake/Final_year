#include <HX711.h>
 #include <SPI.h>
#include <MFRC522.h>


//RFID
#define SS_PIN 10
#define RST_PIN 9

#define echoPin 6 // attach pin D2 Arduino to pin Echo of HC-SR04
#define trigPin 7 //attach pin D3 Arduino to pin Trig of HC-SR04

//weight
#define DOUT  2
#define CLK  3
 
HX711 scale(DOUT, CLK);
// defines variables
long duration; // variable for the duration of sound wave travel
float finalDis;
float inFeet;
int distance; // variable for the distance measurement

MFRC522 mfrc522(SS_PIN, RST_PIN);   // Create MFRC522 instance.
 int incomingByte;
 int incomingBytel;
 int incomingByte2;

 
void setup() 
{
  Serial.begin(9600);   // Initiate a serial communication
  SPI.begin();      // Initiate  SPI bus
  mfrc522.PCD_Init();   // Initiate MFRC522
  pinMode(5, OUTPUT);
  pinMode(3, OUTPUT);
  pinMode(trigPin, OUTPUT); // Sets the trigPin as an OUTPUT
  pinMode(echoPin, INPUT); // Sets the echoPin as an INPUT

}
void loop() 
{

   
    if (Serial.available() > 0) {
       digitalWrite(3, HIGH);
    // read the oldest byte in the serial buffer:
    incomingByte = Serial.read();
     if (incomingByte == 'H') {
      digitalWrite(3, HIGH); //system is on
  // Look for new cards
    if ( ! mfrc522.PICC_IsNewCardPresent()) 
  {
    return;
  }
  // Select one of the cards
  if ( ! mfrc522.PICC_ReadCardSerial()) 
  {
    return;
  }
  //Show UID on serial monitor
  if(mfrc522.uid.size==0){
    Serial.print(00000000, HEX);
  }
  else{

  byte letter;
  for (byte i = 0; i < mfrc522.uid.size; i++) 
  {
     Serial.print(mfrc522.uid.uidByte[i], HEX);
     
  }
  
  Serial.println();
  delay(3000);
  incomingBytel = Serial.read();
   for (byte i = 0; i < 10; i++){
  if (incomingBytel == 'G') {

  // Clears the trigPin condition
  digitalWrite(trigPin, LOW);
  delayMicroseconds(2);
  // Sets the trigPin HIGH (ACTIVE) for 10 microseconds
  digitalWrite(trigPin, HIGH);
  delayMicroseconds(10);
  digitalWrite(trigPin, LOW);
  // Reads the echoPin, returns the sound wave travel time in microseconds
  duration = pulseIn(echoPin, HIGH);
  // Calculating the distance
  distance = duration * 0.034 / 2; // Speed of sound wave divided by 2 (go and back)
  finalDis=210 - distance;
  inFeet= finalDis/30.48;
     Serial.print(inFeet );
     Serial.print(distance);
     
 Serial.println();
  delay(3000);
  //weight measurement
 
//  if (incomingByte2 == 'M') {
//  Serial.print(finalDis);
//     }
}
  }

     }
     }     else{
       Serial.print("None");
     }
}
}
