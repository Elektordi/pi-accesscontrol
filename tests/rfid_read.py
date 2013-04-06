#!/usr/bin/python3

import sys
from datetime import datetime
from datetime import timedelta

# Conf
timeout = timedelta(microseconds=40000)
codesize = 33

# App

import pifacedigitalio as p
p.init()
pfd = p.PiFaceDigital()

gled = p.LED(7)
buzzer = p.LED(6)

code = 0
count = 0
last = datetime.now()

def code_ok(code):
	print("\ncode=%i"%(code))
	gled.turn_on()	

def code_append(bit):
	global code, count, last
	now = datetime.now()
	if (now - last > timeout):
		print("")
		count = 0
		code = 0

	code = (code << 1) + bit
	count = count + 1
	last = now
	sys.stdout.write(str(bit))

	if count == codesize:
		code_ok(code)

def int0(interupt_bit, input_byte):
	code_append(0)

def int1(interupt_bit, input_byte):
	code_append(1)

ifm = p.InputFunctionMap()
ifm.register(6, 0, int0)
ifm.register(7, 0, int1)

print("READY")
p.wait_for_input(ifm, loop=True)
