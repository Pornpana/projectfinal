import mysql.connector
import os
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
