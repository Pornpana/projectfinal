import csv
import mysql.connector
import os
import RPi.GPIO as GPIO
from time import sleep
db = mysql.connector.connect(host='103.13.231.13',
                             database='carpark',
                             user='carpark',
                             password='utcc_cpe')
cur = db.cursor()
with open('Scanout.csv', newline='', encoding='utf-8') as f:
    reader = csv.reader(f)
    for row in reader  :
       # print(row)
        timeout = row[0]
        user = row[1]
        status = row[4]
            #cur.execute("DELETE FROM paycarpark WHERE user =  '" + user + "'")
            #cur.execute('INSERT INTO paycarpark(timeout,user, fistname, lastname, status )''VALUES(%s,%s,%s,%s,%s)',row)
        cur.execute("UPDATE paycarpark SET timeout = '" + timeout + "' WHERE user = '" + user +"'")
        print(row)
        #os.system("cd /home/pi/Desktop/project/finalproject $")
        #os.system("python3 testrelayout.py")
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

db.commit()

cur.close()


        