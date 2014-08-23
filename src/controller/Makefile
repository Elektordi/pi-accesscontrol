CC=gcc
CFLAGS=-Wall
INCLUDES=-L/usr/local/lib/ -lpiface-1.0

# For use on Raspberry
piac-controller: main.c
	$(CC) $(CFLAGS) $(INCLUDES) -o piac-controller main.c

run: piac-controller
	sudo modprobe spi_bcm2708
	sudo killall rfid_read ; true
	sudo LD_LIBRARY_PATH=/usr/local/lib ./rfid_read


# For use on computer
sync: clean
	rsync -r . pi@raspberrypi:accesscontrol/

target: sync
	ssh pi@raspberrypi "cd accesscontrol ; make run"
	
# For both
clean:
	rm -f piac-controller *.o
