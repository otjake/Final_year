
/*  wwww.Youtube.com/c/MegaScience 
    visit this link for Arduino project 
    (full Explanation with project code)
    Non Copyright Project in my Youtube channel
*/


#include <LiquidCrystal.h>

LiquidCrystal lcd(6 , 7, 5, 4, 3, 2);
const int trigPin = 11;
const int echoPin = 10;
long duration;
int distanceCm;
int b;

void setup() {
  
lcd.begin(16,2); // Initializes the interface to the LCD screen, and specifies the dimensions (width and height) of the display
pinMode(trigPin, OUTPUT);
pinMode(echoPin, INPUT);

 Serial.print("   Your Height");
 Serial.print("      Measurement");
delay(3000);

}

void loop() {
  
digitalWrite(trigPin, LOW);
delayMicroseconds(2);
digitalWrite(trigPin, HIGH);
delayMicroseconds(10);
digitalWrite(trigPin, LOW);

duration = pulseIn(echoPin, HIGH);
distanceCm= duration*0.034/2;
//distanceInch = duration*0.0133/2;
b=180-distanceCm;
delay(300);
lcd.setCursor(0,0);
 Serial.println("Set 0:"); // Prints string "Distance" on the LCD
 Serial.println(b); // Prints the distance value from the sensor
 Serial.println("centimeter");
delay(300);
lcd.setCursor(0,1);
if(b<20)
{
    Serial.println("Your Height:");
    Serial.println(b);
    Serial.println("cm");
   delay(300);
}
if(b>=30&&b<=40)
{
   Serial.println("Your Height:");
   Serial.println(b+1);
   Serial.println("cm");
   delay(300);
}
if(b>=41&&b<=49)
{
   Serial.println("Your Height:");
   Serial.println(b+2);
   Serial.println("cm");
   delay(300);
}
if(b>=50&&b<=60)
{
   Serial.println("Your Height:");
   Serial.println(b+3);
   Serial.println("cm");
   delay(300);
}
if(b>=61&&b<=69)
{
  Serial.println("Your Height:");
  Serial.println(b+4);
  Serial.println("cm");
   delay(300);
}
if(b>=70&&b<=80)
{
   Serial.println("Your Height:");
   Serial.println(b+5);
   Serial.println("cm");
   delay(300);
}
if(b>=80&&b<=85)
{
   Serial.println("Your Height:");
   Serial.println(b+6);
   Serial.println("cm");
   delay(300);
}
if(b>=86&&b<=90)
{
  Serial.println("Your Height:");
   Serial.println(b+7);
Serial.println("cm");
   delay(300);
}
if(b>=91&&b<=95)
{
   Serial.println("Your Height:");
   Serial.println(b+8);
   Serial.println("cm");
   delay(300);
}
if(b>=96&&b<=100)
{
   Serial.println("Your Height:");
   Serial.println(b+9);
   Serial.println("cm");
   delay(300);
}
if(b>=101&&b<=105)
{
   Serial.println("Your Height:");
   Serial.println(b+10);
   Serial.println("cm");
   delay(300);
}
if(b>=106)
{
   Serial.println("Your Height:");
   Serial.println(b+11);
  Serial.println("cm");
   delay(300);
}

}
