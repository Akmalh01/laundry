#include <Servo.h>

Servo servo;
const int trigPin = 6;
const int echoPin = 5;

void setup() {
    pinMode(trigPin, OUTPUT);
    pinMode(echoPin, INPUT);
    servo.attach(3);
}

void loop() {
    long duration;
    int distance;

    digitalWrite(trigPin, LOW);
    delayMicroseconds(2);
    digitalWrite(trigPin, HIGH);
    delayMicroseconds(10);
    digitalWrite(trigPin, LOW);

    duration = pulseIn(echoPin, HIGH);

    distance = (duration / 2) / 29.1;

    if (distance <= 50) {
        servo.write(50);
        delay(3000);
    } else {
        servo.write(160);
    }

    delay(100);
}
