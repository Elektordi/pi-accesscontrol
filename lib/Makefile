
all: libpiface libzeromq

libpiface:
	if [ ! -f piface/configure ]; then (cd piface ; ./autogen.sh) fi
	if [ ! -f piface/Makefile ]; then (cd piface ; ./configure) fi
	make -C piface

libzeromq:
	if [ ! -f zeromq-4.0.4/Makefile ]; then (cd zeromq-4.0.4 ; ./configure) fi
	make -C zeromq-4.0.4

clean:
	make -C piface clean
	make -C zeromq-4.0.4 clean
	
arch-clean: clean
	rm piface/configure
	rm piface/Makefile
	rm zeromq-4.0.4/Makefile
