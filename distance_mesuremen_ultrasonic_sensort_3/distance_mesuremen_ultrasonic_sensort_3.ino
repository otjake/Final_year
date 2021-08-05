//tottal duration =microssecods
//speed of sound=344m/sec=34400cm/sec
//time reqired to travel 1cm=1/34400=29 micro second
//ditance=duration/29
///sinnce distanne is calculated on return echo or bounce back,distance has to bbe doubled go=29,bounce bback=29.
//THEREFORE distance=duration/58.
//tthe sensor dosent work for anything llesser than two meters

 int incomingByte;
  int incomingBytel;
  const int trigPin = 11;
const int echoPin = 10;
long duration;
int distanceCm;
int b;
void setup() {
  // put your setup code here, to run once:
  Serial.begin(9600);   // Initiate a serial communication
//  SPI.begin();      // Initiate  SPI bus
//Serial.println("Connection Established");

pinMode(trigPin, OUTPUT);
pinMode(echoPin, INPUT);


 Serial.print("   Your Height");
 Serial.print("      Measurement");
}


void loop() {

   
  if (Serial.available() > 0) {
        incomingByte = Serial.read();
      if (incomingByte == 'H') {
  // put your main code here, to run repeatedly:
digitalWrite(trigPin, LOW);
delayMicroseconds(2);
digitalWrite(trigPin, HIGH);
delayMicroseconds(10);
digitalWrite(trigPin, LOW);
//Accepts pulse returnned
duration=pulseIn(echoPin, HIGH);
//explaned above
duration = pulseIn(echoPin, HIGH);
distanceCm= duration*0.034/2;
//distanceInch = duration*0.0133/2;
b=200-distanceCm;
delay(300);

 Serial.println("Set 0:"); // Prints string "Distance" on the LCD
 Serial.println(b); // Prints the distance value from the sensor
 Serial.println("centimeter");
delay(300);
//if(b<20)
//{
//    Serial.println("Your Height:");
//    Serial.println(b);
//    Serial.println("cm");
//   delay(300);
//}
//if(b>=30&&b<=40)
//{
//   Serial.println("Your Height:");
//   Serial.println(b+1);
//   Serial.println("cm");
//   delay(300);
//}
//if(b>=41&&b<=49)
//{
//   Serial.println("Your Height:");
//   Serial.println(b+2);
//   Serial.println("cm");
//   delay(300);
//}
//if(b>=50&&b<=60)
//{
//   Serial.println("Your Height:");
//   Serial.println(b+3);
//   Serial.println("cm");
//   delay(300);
//}
//if(b>=61&&b<=69)
//{
//  Serial.println("Your Height:");
//  Serial.println(b+4);
//  Serial.println("cm");
//   delay(300);
//}
//if(b>=70&&b<=80)
//{
//   Serial.println("Your Height:");
//   Serial.println(b+5);
//   Serial.println("cm");
//   delay(300);
//}
//if(b>=80&&b<=85)
//{
//   Serial.println("Your Height:");
//   Serial.println(b+6);
//   Serial.println("cm");
//   delay(300);
//}
//if(b>=86&&b<=90)
//{
//  Serial.println("Your Height:");
//   Serial.println(b+7);
//Serial.println("cm");
//   delay(300);
//}
//if(b>=91&&b<=95)
//{
//   Serial.println("Your Height:");
//   Serial.println(b+8);
//   Serial.println("cm");
//   delay(300);
//}
//if(b>=96&&b<=100)
//{
//   Serial.println("Your Height:");
//   Serial.println(b+9);
//   Serial.println("cm");
//   delay(300);
//}
//if(b>=101&&b<=105)
//{
//   Serial.println("Your Height:");
//   Serial.println(b+10);
//   Serial.println("cm");
//   delay(300);
//}
//if(b>=106)
//{
//   Serial.println("Your Height:");
//   Serial.println(b+11);
//  Serial.println("cm");
//   delay(300);
//}

}
     }
   
}
