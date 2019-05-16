from imutils.video import VideoStream
from pyzbar import pyzbar
import RPi.GPIO as GPIO
from time import sleep
import argparse
import datetime
import imutils
import time
import cv2
import csv
import mysql.connector
import os

def csvtest() :
    db = mysql.connector.connect(host='103.13.231.13',
                             database='carpark',
                             user='carpark',
                             password='utcc_cpe')
    cur = db.cursor()
    with open('Scanout.csv', newline='',encoding='utf-8') as f:
        reader = csv.reader(f)
        i = 1
        for row in reader  :
       # print(row)
            timein = row[0]
            user = row[1]
        
            if row[1]!=row[1]:
            #cur.execute('INSERT INTO paycarpark(timein,user, fistname, lastname, status )''VALUES(%s,%s,%s,%s,%s)',row)
                print ("")
            else:
                cur.execute("DELETE FROM paycarpark WHERE user =  '" + user + "' AND timein = '"+timein+"'")
##            cur.execute("UPDATE paycarpark SET pay = '" + pay + "' WHERE user = '" + user +"'")
                cur.execute('INSERT INTO paycarpark(timein,user, fistname, lastname, status )''VALUES(%s,%s,%s,%s,%s)',row)
           # cur.execute("UPDATE paycarpark SET timeout = '" + timeout + "' WHERE user = '" + user +"'")
                print(row)
                #relay()
                os.system("cd /home/pi/Desktop/project/finalproject $")
                os.system("python3 testrelay.py")        
##cur.execute("SELECT * FROM paycarpark ")#WHERE user =  '" +str(user) + "'")
##for row in cur :
##    print (row)
    db.commit()
    cur.close()
    
def QRcode() :
    # construct the argument parser and parse the arguments
    ap = argparse.ArgumentParser()
    ap.add_argument("-o", "--output", type=str, default="Scanout.csv",
                    help="path to output CSV file containing barcodes")
    args = vars(ap.parse_args())
# initialize the video stream and allow the camera sensor to warm up
    print("[INFO] starting video stream...")
# vs = VideoStream(src=0).start()
    vs = VideoStream(usePiCamera=True).start()
    time.sleep(2.0)
# open the output CSV file for writing and initialize the set of
# barcodes found thus far
    csv = open(args["output"], "w")
    found = set()

# loop over the frames from the video stream
    while True:
	# grab the frame from the threaded video stream and resize it to
	# have a maximum width of 400 pixels
	frame = vs.read()
	frame = imutils.resize(frame, width=400)
	# find the barcodes in the frame and decode each of the barcodes
	barcodes = pyzbar.decode(frame)
	# loop over the detected barcodes
	for barcode in barcodes:    
		# extract the bounding box location of the barcode and draw
		# the bounding box surrounding the barcode on the image
	    (x, y, w, h) = barcode.rect
	    cv2.rectangle(frame, (x, y), (x + w, y + h), (0, 0, 255), 2)
	    #csvtest()
            os.system("cd /home/pi/Desktop/project/finalproject $")
            os.system("python3 testcsvout.py")
		# the barcode data is a bytes object so if we want to draw it
		# on our output image we need to convert it to a string first
	    barcodeData = barcode.data.decode("utf-8") 
	    barcodeType = barcode.type       
		# draw the barcode data and barcode type on the image
	    text = "{} ({})".format(barcodeData, barcodeType)
	    cv2.putText(frame, text, (x, y - 10),
	    cv2.FONT_HERSHEY_SIMPLEX, 0.5, (0, 0, 255), 2)
                        
		# if the barcode text is currently not in our CSV file, write
		# the timestamp + barcode to disk and update the set
	    if barcodeData not in found:
		csv.write("{},{}\n".format(datetime.datetime.now(),barcodeData))
		csv.flush()
		found.add(barcodeData)
		
	# show the output frame
	
	cv2.imshow("Barcode Scanner", frame)
	key = cv2.waitKey(1) & 0xFF
	
	# if the `q` key was pressed, break from the loop
	if key == ord("q"):
            break
# close the output CSV file do a bit of cleanup
    
    print("[INFO] cleaning up...")
    csv.close()
    cv2.destroyAllWindows()
    vs.stop()
    close()
    
    
def relay() :
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
    
def sum() :
    db = mysql.connector.connect(host='103.13.231.13',
                             database='carpark',
                             user='carpark',
                             password='utcc_cpe')
    
# you must create a Cursor object. It will let
#  you execute all the queries you need
    cur = db.cursor()
    ch = input("input")
    cur.execute("SELECT *,CONCAT(HOUR(difftime)) AS timetaken FROM (SELECT *,SEC_TO_TIME(UNIX_TIMESTAMP(timeout) - UNIX_TIMESTAMP(timein))AS diffTime FROM paycarpark WHERE user = '"+ str(ch) +"' )AS temptable1")
# Use all the SQL you like
    for row in cur :
        user = row[1]
        timein = row[5]
        timeout = row[6]
        status = row[4]
        pay = row[7]
        H = row[9]
        sum = 0
    
        if row[4] == 'student':
            if int(H) < 2 :
                pay = 0
            elif int(H) >= 2 :
                pay = pay + 10+((int(H)-1)*5)

        elif row[4] == 'vip':
            pay = 0
                
        elif row[4] == 'professor':
            pay = pay +12
          
        elif row[4] == 'officer':
            pay = pay+ 12
        print (pay)   
        cur.execute("UPDATE paycarpark SET pay = '" + str(pay) + "' WHERE user = '" + user +"'")
#print(row)
        db.commit()
    cur.close()

QRcode()

