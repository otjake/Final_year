#include <HX711.h>

/*
 * 
 * All the resources for this project: https://www.hackster.io/Aritro
 * Modified by Aritro Mukherjee
 * 
 * 
 */
 
#include <SPI.h>
#include <MFRC522.h>
 
#define SS_PIN 10
#define RST_PIN 9
MFRC522 mfrc522(SS_PIN, RST_PIN);   // Create MFRC522 instance.
 int incomingByte;
  int incomingBytel;

 
void setup() 
{
  Serial.begin(9600);   // Initiate a serial communication
  SPI.begin();      // Initiate  SPI bus
  mfrc522.PCD_Init();   // Initiate MFRC522
    pinMode(5, OUTPUT);
     pinMode(3, OUTPUT);

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
  if (incomingBytel == 'G') {
     digitalWrite(3, LOW);
    delay(1000); 
  digitalWrite(5, HIGH);
  
 
     }
}

     }
     else{
       Serial.print("None");
     }
}
}
