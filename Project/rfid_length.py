#!C:\Users\PROVIDER00\AppData\Local\Programs\Python\Python39\python
print("Content-Type: text/html")
print()

# arduino file:web led control.
# html
print("""
<!DOCTYPE html>
<html lang="en">
  <head>

    <title>Title</title>
  </head>
  <body>
  <form action="rfid_length.py" method="post">

         <input type="submit"  value="Scan" name="rolli">
  </form>

  </body>
</html>""")
# command gateway interface

import cgi, os
import cgitb;cgitb.enable()
import serial
import time
from datetime import datetime

# Define the serial port and baud rate.
# Ensure the 'COM#' corresponds to what was seen in the Windows Device Manager


ser = serial.Serial('COM7', 9600)
formvar = cgi.FieldStorage()
roll = formvar.getvalue("rolli")
import mysql.connector

conn = mysql.connector.connect(
    host='localhost',
    user='root',
    password='',
    database='access_project'
)


def led_on_off():
    if roll == "Scan":
        ser.write(b'H')
        ardval = ser.readline()
        test = str(ardval)[2:-5]
        time.sleep(0.1)

        # wanted =test
        # print(wanted)
        myholder2 = conn.cursor()
        query = """select * from masters_tb where tag= %s"""
        myholder2.execute(query, (test,))
        resultholder2 = myholder2.fetchall()
        rowCounter = myholder2.rowcount
        if rowCounter > 0:
            now=datetime.now()
            insert1="INSERT INTO access_record (master_id,rfid_ref,access_time) VALUES(%s,%s,%s);"
            val=(resultholder2[0][0],resultholder2[0][1],now)
            myholder2.execute(insert1,val)
            conn.commit()


            # sendng signal to show successful reading
            ser.write(b'G')
            data =[]                       # empty list to store the data
            for i in range(1):
                b = ser.readline()         # read a byte string
                string_n = b.decode()  # decode byte string into Unicode
                string = string_n.rstrip() # remove \n and \r
                #print(string)
                data.append(string)           # add to the end of data list
                time.sleep(0.1)            # wait (sleep) 0.1 seconds

            # show the data

            for line in data:
                #print("Height: " + line)
                #print("-")
                tese=list(line)
                #print("-")
                print(tese)
                print("Height: " + tese[0]+tese[1]+tese[2]+tese[3])
                print("Weight: " + tese[4]+tese[5]+tese[6]+tese[7])
            print("""
                                  <!DOCTYPE html>
                                  <html lang="en">
                                    <head>

                                      <title>Title</title>
                                    </head>
                                    <body>
                                  <a href=all_tags.php'>Add index to student record</a>
                                    </body>
                                  </html>""")

        else:
            print("no records,register new tag below " + " Tag number= " + test)
            print("""
                                  <!DOCTYPE html>
                                  <html lang="en">
                                    <head>

                                      <title>Title</title>
                                    </head>
                                    <body>
                                  <a href='index.php'>Register new student,Kindly note Tag number</a>
                                    </body>
                                  </html>""")


    #
    # elif roll == "off":
    #     print("LED is off...")
    #     ser.write(b'L')
    #     print(str(ser.readline())[2:-5])
    #     time.sleep(0.1)
    #
    # elif roll == "quit" or roll == "q":
    #     print("Program Exiting")
    #     time.sleep(0.1)
    #     ser.write(b'L')
    #     ser.close()
    # # else:
    # #     print("Invalid input. Type on / off / quit.")


time.sleep(2)  # wait for the serial connection to initialize

led_on_off()
