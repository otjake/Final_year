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
void setup() {
  // put your setup code here, to run once:
  Serial.begin(9600);   // Initiate a serial communication
//  SPI.begin();      // Initiate  SPI bus
//Serial.println("Connection Established");

pinMode(trigPin, OUTPUT);
pinMode(echoPin, INPUT);
}
long duration,distance,finalDis;
double inFeet,distanceCm;
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

distanceCm= duration/ 29 /2;
finalDis=200 - distanceCm;
inFeet= finalDis/30.48;


//distanceCm= duration*0.034/2;
//finalDis=200 - distanceCm;
//inFeet= finalDis/30.48;
Serial.print("height in ft");
Serial.println(inFeet);
Serial.print("height in cm");
Serial.println(finalDis);
Serial.print("dur convert");
Serial.println(distanceCm);
delay(3000);


}
     }
   
}
