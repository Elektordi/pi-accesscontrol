CC=gcc
CFLAGS=-Wall
INCLUDES=-I../../lib/piface/src/piface/ -L../../lib/piface/.libs/ -lpiface-1.0

# For use on Raspberry
piac-controller: main.c
	make -C ../../lib/ libpiface
	make -C ../../lib/ libzeromq
	$(CC) $(CFLAGS) $(INCLUDES) -o piac-controller main.c

run: piac-controller
	sudo modprobe spi_bcm2708
	sudo killall piac-controller ; true
	sudo LD_LIBRARY_PATH=../../lib/piface/.libs/ ./piac-controller
	
install: piac-controller
	echo TODO


# For use on computer
sync: clean
	rsync -r . pi@raspberrypi:accesscontrol/

target: sync
	ssh pi@raspberrypi "cd accesscontrol ; make run"
	
# For both
clean:
	rm -f piac-controller *.o
	
