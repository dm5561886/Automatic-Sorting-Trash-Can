# -*- coding: utf-8 -*-
import tensorflow as tf
import numpy as np
import cv2
import time
import RPi.GPIO as GPIO
import math
import threading
import mysql.connector
from datetime import datetime
import warnings

warnings.filterwarnings("ignore")
model_file = "trash_model.h5"
model = tf.keras.models.load_model(model_file)


#set camera#
video_capture = cv2.VideoCapture(0)
width=640
height=480


#set window size
video_capture.set(cv2.CAP_PROP_FRAME_WIDTH,640)
video_capture.set(cv2.CAP_PROP_FRAME_HEIGHT,480)


#set motor model#
GPIO.setmode(GPIO.BCM)
GPIO.setwarnings(False)
GPIO.setup([14,15,18,23], GPIO.OUT)
pwm1=GPIO.PWM(14,50)
pwm2=GPIO.PWM(15,50)
pwm3=GPIO.PWM(18,50)
pwm1.start(0)
pwm2.start(0)
flag=False
start=False

def door1():
    pwm3.start(0)
    pwm3.ChangeDutyCycle(angle_to_duty_cycle(98))
    time.sleep(0.7)
    pwm3.ChangeDutyCycle(angle_to_duty_cycle(78))
    time.sleep(0.5)
    pwm3.ChangeDutyCycle(angle_to_duty_cycle(63))
    time.sleep(0.7)
    pwm3.ChangeDutyCycle(angle_to_duty_cycle(78))
    pwm3.ChangeDutyCycle(0)

def angle_to_duty_cycle(angle=0):
    duty_cycle = (0.055* 50) + (0.19 * 50 * angle / 180)
    return duty_cycle
def motor_model(temp):
    if temp==0:
        door1()
    if temp==1:
        pwm2.ChangeDutyCycle(angle_to_duty_cycle(75))
        time.sleep(2)
        door1()
        time.sleep(2)
        pwm2.ChangeDutyCycle(angle_to_duty_cycle(3))
        time.sleep(2)
        pwm2.ChangeDutyCycle(0)
    if temp==2:
        pwm2.ChangeDutyCycle(angle_to_duty_cycle(140))
        time.sleep(2)
        door1()
        time.sleep(2)
        pwm2.ChangeDutyCycle(angle_to_duty_cycle(3))
        time.sleep(1)
        pwm2.ChangeDutyCycle(0)
    if temp==3:
        pwm2.ChangeDutyCycle(angle_to_duty_cycle(140))
        time.sleep(2)
        pwm1.ChangeDutyCycle(angle_to_duty_cycle(90))
        time.sleep(2)
        door1()
        time.sleep(2)
        pwm1.ChangeDutyCycle(angle_to_duty_cycle(3))
        time.sleep(2)
        pwm2.ChangeDutyCycle(angle_to_duty_cycle(3))
        time.sleep(1)
        pwm1.ChangeDutyCycle(0)
        pwm2.ChangeDutyCycle(0)
def camera(p0,p1):
    #將圖片轉成黑白
    grey1 = cv2.cvtColor(p0, cv2.COLOR_BGR2GRAY)
    grey2 = cv2.cvtColor(p1, cv2.COLOR_BGR2GRAY)
    #將圖片進行高斯模糊處理
    blur1 = cv2.GaussianBlur(grey1,(9,9),0)
    blur2 = cv2.GaussianBlur(grey2,(3,3),0)
    #讀取兩個圖片的差異
    d = cv2.absdiff(blur1, blur2)
    #將圖片進行二值化處理
    ret, th = cv2.threshold( d, 10, 255, cv2.THRESH_BINARY )
    #使用cv2.dilate進行擴張處理，可避免當移動速度過快差異不顯著時加強。
    dilated=cv2.dilate(th, None, iterations=1)
    #抓取輪廓
    contours,hierarchy = cv2.findContours(dilated,cv2.RETR_EXTERNAL,cv2.CHAIN_APPROX_SIMPLE)
    #取得圖形的面積
    areas=[]
    for c in contours:
        areas.append(cv2.contourArea(c))
    max_index = np.argmax(areas)
    if(max_index==""):
        max_index=1
    cnt=contours[max_index]
    x,y,w,h = cv2.boundingRect(cnt)
    return x,y,w,h

def SQL(a):
    if a==0:
        steam="battery"
    elif a==1:
        steam="others"
    elif a==2:
        steam="can"
    elif a==3:
        steam="paper"
    now=datetime.now()
    year=now.strftime("%Y")
    month=now.strftime("%m")
    day=now.strftime("%d")
    alltime=now.strftime("%Y-%m-%d")
    database = mysql.connector.connect(
        host="163.17.9.121",
        user="10614033",
        password="123456789",
        database="trash",
        )
    cursor=database.cursor()

    sqlStuff=("INSERT INTO trash_identify (id_serial, id, t_year , t_month , t_date , t_time) VALUES (%s,%s,%s,%s,%s,%s)")

    records=(a,steam,year,month,day,alltime)

    cursor.execute(sqlStuff,records)
    database.commit()
    cursor.close()
    database.close()
    print("ok,數據已載入資料庫")
print("請投入垃圾")
while True:
    still1=video_capture.read()[1]
    still2=video_capture.read()[1]
    x1,y1,w1,h1=camera(still1,still2)
    ret,frame = video_capture.read()
    t0=video_capture.read()[1]
    t1=video_capture.read()[1]
    x2,y2,w2,h2=camera(t0,t1)
    cv2.rectangle(frame,(x2,y2),(x2+w2,y2+h2),(0,0,255),2)
    cv2.imshow('Identify Video', frame)
    cv2.waitKey(25)
    total=abs(x2-x1)+abs(y2-y1)+abs(w2-w1)+abs(h2-h1)
    if(total>755):
        flag=True
        start=True
    if(total<200):
        flag=True
    if(start==True and flag==True):
        time.sleep(3)
        video_capture.release()
        video_capture = cv2.VideoCapture(0)
        ret,check = video_capture.read()
        cv2.imshow('Check Video', check)
        img = cv2.resize(check, (224, 224), interpolation = cv2.INTER_AREA)
        #再將圖片轉為一維陣列#
        data = np.asarray(img, dtype="int32" ) / 255.0
        #將一維陣列轉為2維陣列#
        inputImg = np.expand_dims(data,0).astype(np.float32)
        #套入模組預測#
        predictions = model.predict(inputImg)
        #得到預測答案#
        answer=np.argmax(predictions[0])
        #將答案取出#
        if(answer==0):
            print("寶特瓶")
        if(answer==1):
            print("鐵鋁罐")
        if(answer==2):
            print("others")
        if(answer==3):
            print("紙盒與鋁箔包")
        SQL(int(answer))
        motor_model(int(answer))
        pwm3.ChangeDutyCycle(0)
        start=False
        flag=False
        print("請投入垃圾")
        time.sleep(3)
    if cv2.waitKey(30) & 0xFF == ord('q'):
        pwm1.stop()
        pwm2.stop()
        GPIO.cleanup()
        break