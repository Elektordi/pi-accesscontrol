#include <unistd.h>
#include <stdio.h>
#include <stdlib.h>
#include <sys/time.h>
#include <signal.h>
#include <stdbool.h>
#include <string.h>
#include <assert.h>

#include <pfio.h>
#include <zmq.h>

#include "config.h"

// ZMQ

char * s_recv (void *socket);
int s_send (void *socket, const char *string);
