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
// include the library code:
#include <LiquidCrystal.h>

// initialize the library by associating any needed LCD interface pin
// with the arduino pin number it is connected to
const int rs = 13, en = 8, d4 = 5, d5 = 4, d6 = 3, d7 = 2;
LiquidCrystal lcd(rs, en, d4, d5, d6, d7);

#define SS_PIN 10
#define RST_PIN 9
#define dirPin 6
#define stepPin 7
#define stepsPerRevolution 1600
MFRC522 mfrc522(SS_PIN, RST_PIN);   // Create MFRC522 instance.
 int incomingByte;
  int incomingBytel;

 
void setup() 
{
  Serial.begin(9600);   // Initiate a serial communication
  SPI.begin();      // Initiate  SPI bus
  mfrc522.PCD_Init();   // Initiate MFRC522
  
       // Declare pins as output:
  pinMode(stepPin, OUTPUT);
  pinMode(dirPin, OUTPUT);

   // set up the LCD's number of columns and rows:
  lcd.begin(16, 2);
  // Print a message to the LCD.
  lcd.print("hello, world!");

}
void loop() 
{

   
    if (Serial.available() > 0) {
 
    // read the oldest byte in the serial buffer:
    incomingByte = Serial.read();
     if (incomingByte == 'H') {
     
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
   // Set the spinning direction clockwise:
  digitalWrite(dirPin, HIGH);

  
  // Lcd out
  lcd.setCursor(0, 1);
  // print the number of seconds since reset:
  lcd.print("IN");

  
  // Spin the stepper motor 1 revolution slowly:
  for (int i = 0; i < stepsPerRevolution; i++) {
    // These four lines result in 1 step:
    digitalWrite(stepPin, HIGH);
    delayMicroseconds(2000);
    digitalWrite(stepPin, LOW);
    delayMicroseconds(2000);
  }

  delay(5000);

  // Set the spinning direction counterclockwise:
  digitalWrite(dirPin, LOW);

  // Spin the stepper motor 1 revolution quickly:
  for (int i = 0; i < stepsPerRevolution; i++) {
    // These four lines result in 1 step:
    digitalWrite(stepPin, HIGH);
    delayMicroseconds(1000);
    digitalWrite(stepPin, LOW);
    delayMicroseconds(1000);
    
  }
 
     }else{
        // Lcd out
  lcd.setCursor(0, 1);
  // print the number of seconds since reset:
  lcd.print("OUT");
     }
}

     }
     else{
       Serial.print("None");
     }
}
}
