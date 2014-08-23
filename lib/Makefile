
all: libpiface libzeromq

libpiface:
	if [ ! -f zeromq-4.0.4/configure ]; then (cd zeromq-4.0.4 ; ./autogen.sh) fi
	if [ ! -f zeromq-4.0.4/Makefile ]; then (cd zeromq-4.0.4 ; ./configure) fi
	make -C piface

libzeromq:
	if [ ! -f zeromq-4.0.4/Makefile ]; then (cd zeromq-4.0.4 ; ./configure) fi
	make -C zeromq-4.0.4

clean:
	make -C piface clean
	make -C zeromq-4.0.4 clean
