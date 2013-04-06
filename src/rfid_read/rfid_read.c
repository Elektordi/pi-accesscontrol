#include <unistd.h>
#include <sys/time.h>
#include <signal.h>
#include <libpiface-1.0/pfio.h>

#define BITSCOUNT 34
#define TIMEOUT 40000
#define DOOR_DELAY 5

#define PIN_DOOR 1
#define PIN_BUZZER 7
#define PIN_GLED 8

#define DEBUG 1

typedef char bool;

struct card {
	struct card * next;
	long int code;
};

struct card * cards; // Global

void read_config()
{
    long int code = 0;
    cards = NULL;
    
#if DEBUG
    printf("Reading config...\n");
#endif
    FILE * file = fopen ("cards.txt","r");
    if (file == NULL) perror("Unable to load cards.txt");
    while(fscanf(file,"%li %*s",&code)==1) {
#if DEBUG
    	printf("New code: %li\n",code);
#endif
			struct card * newcard = (struct card *)malloc(sizeof(struct card));
			newcard->code = code;
			newcard->next = cards;
			cards = newcard;
    }
    fclose (file);
#if DEBUG
    printf("Config ok.\n");
#endif
}

void signal_handler(int sig)
{
		if(sig==SIGHUP) read_config();
}

int main(void)
{
    if (pfio_init() < 0) perror("Cannot start PFIO");

    long int code = 0, last = 0;
    int count = 0;
    bool last_d0 = 0, last_d1 = 0;
    
    read_config();
    
    if(signal(SIGHUP, signal_handler) == SIG_ERR) perror("Cannot handle signals.");

#if DEBUG
    printf("Ready!");
#endif

    while (1)
    {
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

      bool d0 = (i & 0x40)>0;
      bool d1 = (i & 0x80)>0;
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

				struct card * c = cards;
				bool allowed = 0;
				while(c) {
					if(c->code == code) {
						allowed = 1;
						break;
					}
					c = c->next;
				};

        if(allowed) {
            // Accepte
#if DEBUG
          printf("Access authorized!\n");
#endif
          pfio_digital_write(PIN_DOOR,1);
          pfio_digital_write(PIN_GLED,1);
          sleep(DOOR_DELAY);
          pfio_digital_write(PIN_GLED,0);
          pfio_digital_write(PIN_DOOR,0);
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
            pfio_digital_write(PIN_BUZZER,1);
            usleep(100000);
            pfio_digital_write(PIN_BUZZER,0);
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
