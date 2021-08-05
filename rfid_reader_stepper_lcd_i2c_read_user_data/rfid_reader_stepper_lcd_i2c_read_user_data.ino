// include the library code:
#include <HX711.h>
#include <SPI.h>
#include <MFRC522.h>
#include <Wire.h> 
#include <LiquidCrystal_I2C.h>

//I2C pins declaration
LiquidCrystal_I2C lcd(0x27, 2, 1, 0, 4, 5, 6, 7, 3, POSITIVE); 

//Stepper motor driver pins
#define SS_PIN 10
#define RST_PIN 9
#define dirPin 6
#define stepPin 7
#define stepsPerRevolution 1600

// Create MFRC522 instance for card reader.
MFRC522 mfrc522(SS_PIN, RST_PIN);   
 int incomingByte;
  int incomingBytel;

 
void setup() 
{
  Serial.begin(9600);   // Initiate a serial communication
  SPI.begin();      // Initiate  SPI bus
  mfrc522.PCD_Init();   // Initiate MFRC522
  
  // Declare pins as output for stepper motor:
  pinMode(stepPin, OUTPUT);
  pinMode(dirPin, OUTPUT);

  lcd.begin(16,2);//Defining 16 columns and 2 rows of lcd display
  lcd.backlight();//To Power ON the back light
//lcd.backlight();// To Power OFF the back light
  lcd.setCursor(0,0);  //Defining positon to write from second row,first column .
  lcd.print("WELCOME");

}
void loop() 
{

   
    if (Serial.available() > 0) {
 
    // read the oldest byte in the serial buffer:
    incomingByte = Serial.read();

    //an H is sent from python code to initiate reading
     if (incomingByte == 'H') {
     
    // Look for new cards

    //if none are found
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

 //on successful read a G is passed from our python code
  if (incomingBytel == 'G') {
   // Set the spinning direction clockwise:
      digitalWrite(dirPin, HIGH);
    
    // Lcd out
    lcd.setCursor(0, 0);
    lcd.print("Access Granted");

    
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
    delay(2000);

    //lcd OUT
    lcd.setCursor(0, 0);
    lcd.print("Scan card for access");
 
     }
     //IF A G ISN'T SENT BACK
     else{
                // Lcd out
          lcd.setCursor(0, 0);
          lcd.print("Access denied");
        }
}

     }
     else{
       Serial.print("None");
     }
}
}
