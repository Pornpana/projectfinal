import RPi.GPIO as GPIO
from time import sleep
import os
import mysql.connector
GPIO.setmode(GPIO.BCM)
ch = '1'
while(ch == '1'):
    sleep(2)
    print ("OPEN")
    GPIO.setup(15, GPIO.OUT)
    sleep(5)
    print("close")
    GPIO.output(15, GPIO.HIGH)
    sleep(1)
    print("off")
    GPIO.output(15, GPIO.OUT)
    
    break

GPIO.cleanup()
