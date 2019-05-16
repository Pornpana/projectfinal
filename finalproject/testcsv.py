import csv
import mysql.connector
import os
db = mysql.connector.connect(host='103.13.231.13',
                             database='carpark',
                             user='carpark',
                             password='utcc_cpe')
cur = db.cursor()


with open('Scanin.csv',newline='', encoding='utf-8') as f:
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
            os.system("cd /home/pi/Desktop/project/finalproject $")
            os.system("python3 testrelay.py")        
##cur.execute("SELECT * FROM paycarpark ")#WHERE user =  '" +str(user) + "'")
##for row in cur :
##    print (row)

db.commit()
cur.close()