#include "helpers.h"

#define MASK_EXIT (1 << (PIN_EXIT-1))
#define MASK_LOCK (1 << (PIN_LOCK-1))
#define MASK_D0 (1 << (PIN_D0-1))
#define MASK_D1 (1 << (PIN_D1-1))

void beep(int ms) {
    pfio_digital_write(PIN_BUZZER,1);
    usleep(ms*1000);
    pfio_digital_write(PIN_BUZZER,0);
}

void open_door_start()
{
    pfio_digital_write(PIN_DOOR,1);
    pfio_digital_write(PIN_GLED,1);
}

void open_door_stop()
{
    pfio_digital_write(PIN_GLED,0);
    pfio_digital_write(PIN_DOOR,0);
}

void open_door(bool open_beep)
{
    open_door_start();
    if(open_beep) beep(100);
    sleep(DOOR_DELAY);
    open_door_stop();
}


void signal_handler(int sig)
{
    if(sig==SIGUSR1) {
        open_door(1);
    } else if(sig==SIGHUP) {
        // TODO
    } else if(sig==SIGINT) {
        printf("Got SIGINT! Exiting...");
        exit(0);
    }
}

int main(void)
{
    assert(pfio_init() == 0);

    long int code = 0, last = 0;
    int count = 0;
    bool last_d0 = 0, last_d1 = 0;
    
    bool locked = 0;
    
    void *context = zmq_ctx_new();
    void *zmq_events = zmq_socket(context, ZMQ_REQ);
    int rc = zmq_connect(zmq_events, "tcp://localhost:5551"); // TODO: Rendre dynamique
    assert (rc == 0);
    
    #if DEBUG
    printf("Requesting config...\n");
    #endif
    s_send(zmq_events, "00000DUMMYSN00000:ALIVE");
    char *config = s_recv(zmq_events);
    #if DEBUG
    printf("Got config: %s\n", config);
    #endif
    
    assert(signal(SIGHUP, signal_handler) != SIG_ERR);
    assert(signal(SIGUSR1, signal_handler) != SIG_ERR);
    assert(signal(SIGINT, signal_handler) != SIG_ERR);

    beep(1000);

    #if DEBUG
    printf("Ready!\n");
    #endif

    while (1) {
        int i = pfio_read_input();
        if(i == 0xFF) usleep(1);

        struct timeval tv;
        gettimeofday(&tv, NULL);
        long int now = tv.tv_usec + tv.tv_sec*1000;

        if((now - last > TIMEOUT)||(now<last)) {
            #if DEBUG
            printf(" - ");
            #endif
            count = 0;
            code = 0;
        }

        bool d0 = (i & MASK_D0)==0;
        bool d1 = (i & MASK_D1)==0;
        bool button = (i & MASK_EXIT)==0;
        bool lockcmd = (i & MASK_LOCK)==0;

        if(lockcmd || locked) {
            #if DEBUG
            printf("*** LOCK ***\n");
            #endif
            while(((pfio_read_input() & MASK_LOCK)==0)||locked) {
                pfio_digital_write(PIN_GLED,1);
                usleep(200000);
                pfio_digital_write(PIN_GLED,0);
                usleep(200000);
            }
            #if DEBUG
            printf("*** UNLOCK ***\n");
            #endif
        }
        
        if(button) {
            #if DEBUG
            printf("Exit button pressed!!!\n");
            #endif
            open_door_start();
            beep(100);
            while((pfio_read_input() & MASK_EXIT)==0) sleep(1);
            #if DEBUG
            printf("Exit button released!!!\n");
            #endif
            sleep(DOOR_DELAY);
            open_door_stop();
        }
        
        if(d0 && !last_d0) {
            #if DEBUG
            printf("0");
            #endif
            code = code << 1;
            count++;
        }
        if(d1 && !last_d1) {
            #if DEBUG
            printf("1");
            #endif
            code = (code << 1) + 1;
            count++;
        }

        if(count==BITSCOUNT) {
            #if DEBUG
            printf("[%li]\n",code);
            #endif
            
            bool allowed = 1; // TODO

            if(allowed) {
                // Accepte
                #if DEBUG
                printf("Access authorized!\n");
                #endif
                open_door(0);
                #if DEBUG
                printf("OK\n");
                #endif

            } else {
                // Refuse
                #if DEBUG
                printf("Access denied!\n");
                 #endif
                int n;
                for(n=0; n<3; n++) {
                    usleep(200000);
                    beep(100);
                }
                #if DEBUG
                printf("OK\n");
                #endif
            }

            code = 0;
            count = 0;
        }

        #if DEBUG
        fflush(stdout);
        #endif

        last_d0 = d0;
        last_d1 = d1;
        last = now;
    }

    pfio_deinit();
    return 0;
}
