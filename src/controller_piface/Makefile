CC=gcc
CFLAGS=-Wall
INCLUDES_PIFACE=-I../../lib/piface/src/piface/ -L../../lib/piface/.libs/ -lpiface-1.0
INCLUDES_ZEROMQ=-I../../lib/zeromq-4.0.4/include/ -L../../lib/zeromq-4.0.4/src/.libs/ -lzmq
INCLUDES=$(INCLUDES_PIFACE) $(INCLUDES_ZEROMQ)

# For use on Raspberry

all: libs piac-controller

libs:
	make -C ../../lib/ libpiface
	make -C ../../lib/ libzeromq

piac-controller: *.c *.h
	$(CC) $(CFLAGS) $(INCLUDES) -o piac-controller *.c

run: piac-controller
	sudo modprobe spi_bcm2708
	sudo killall piac-controller ; true
	sudo LD_LIBRARY_PATH=../../lib/piface/.libs/:../../lib/zeromq-4.0.4/src/.libs/ ./piac-controller
	
install: piac-controller
	echo TODO


# For use on computer
sync: clean
	rsync -r . pi@raspberrypi:accesscontrol/

target: sync
	ssh pi@raspberrypi "cd accesscontrol ; make run"
	
# For both
clean:
	rm -f piac-controller *.o *.so
	
