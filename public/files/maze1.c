#include <stdlib.h>
#include <stdio.h>
#include <string.h>
#include <time.h>

char maze[15][30]={{'_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_'},
						{'|',' ','|',' ',' ',' ',' ',' ','|',' ','|','=','=',' ','|',' ',' ',' ',' ','|',' ',' ',' ',' ',' ',' ',' ','|',' ','|'},
						{'|',' ','|',' ','=','=','=','=','|',' ',' ',' ','|',' ','=','=','=','|',' ','|',' ','|','=','=','=','=',' ','|',' ','|'},
						{'|',' ','|',' ',' ',' ','|',' ','|',' ','|',' ','|',' ',' ',' ',' ','|',' ','|',' ','|',' ','|',' ',' ',' ','|',' ','|'},
						{'|',' ','|',' ','|',' ','|',' ','|',' ','|',' ','|','=',' ','|',' ','|',' ',' ',' ','|',' ','|',' ','|',' ','|',' ','|'},
						{'|',' ',' ',' ','|',' ','|',' ','|',' ','|',' ',' ',' ',' ','|',' ','|',' ','|',' ','|',' ','|',' ','|',' ',' ',' ','|'},
						{'|','=','=','=','|',' ','|',' ','|',' ','|',' ','|','=','=','=',' ','|','=','=',' ','|',' ','|',' ','|','=','=','=','|'},
						{'|',' ',' ',' ',' ',' ','|',' ','|',' ','|',' ','|',' ','[',']',' ','|',' ','|',' ','|',' ','|',' ',' ',' ',' ',' ','|'},
						{'|',' ','|',' ','=','=','=','=','|',' ','=','=','|',' ','=','=','=','|',' ','|',' ','|','=','=','=','=',' ','|',' ','|'},
						{'|',' ','|',' ','|',' ','|',' ','|',' ','|',' ','|',' ','|',' ',' ',' ',' ','|',' ','|',' ','|',' ','|',' ','|',' ','|'},
						{'|',' ','=','=','|',' ','|',' ','|',' ',' ',' ','|',' ','|',' ','=','|',' ','|',' ','|',' ','|',' ','|','=','=',' ','|'},
						{'|',' ',' ',' ','|',' ',' ',' ','|',' ','|',' ','|',' ',' ',' ',' ','|',' ','|',' ','|',' ',' ',' ','|',' ',' ',' ','|'},
						{'|','=','=',' ','|',' ','|',' ','|',' ','|',' ','|','=','=','=',' ','|',' ',' ',' ','|',' ','|',' ','|',' ','=','=','|'},
						{'|',' ',' ',' ',' ',' ','|',' ',' ',' ','|',' ',' ',' ',' ','|',' ','=','=','|',' ','|',' ','|',' ',' ',' ',' ',' ','|'},
						{':',':',':',':',':',':',':',':',':',':',':',':',':',':',':',':',':',':',':',':',':',':',':',':',':',':',':',':',':',':'}};
	
	int l;
	char x='#';
	int x1=7;
	int x2=16;
	int d=0;
	int z=0;
	int q1=1;
	int q2;
	int e=2;
	int hp=100;
	char p=' ';
	
void hpbar(int *health){

 	int i;
 	char c='%';
 	char d=']';
	printf("\n");
    for(i = 100; *health<=i; i--){
    	printf("\rPlayer 1's HP[ %d%c%c ", i,c,d);
       }
    printf("\n\n");
 }
char questions(int *x,int *bar)
{   
	static char questions[35][500]={"Constructors are inherited in derive classes in c++.True or False?",
	"You can\'t separate classes in different files in c++. True or False?",
	"A special function in a class that is called when a new object of the class is created.",
	"A constructor which creates an object by initializing it with an object of the same class, which has been created previously.",
	"Destructors deletes the object including the class. True or False?",
	"What can travel around the world while staying in a corner?",
	"What room can no one enter?",
    "In school, the pure ones always tell the truth and the corrupted always tell a lie. Which of them could make the following statement?\n\n\t\'I always tell the truth.'",
    "A function is said to be _________ if it is one-to-one.",
    "Data ______ is one of the important features of Object Oriented Programming which prevents the functions of a program to access directly the internal representation of a class type.",
    "What will be the output of the program?\n\n\tstatic char *s[] = {""black, white, pink, violet""};\n\tchar **ptr[] = {s+3, s+2, s+1, s}, ***p;\n\tp = ptr;\n\t++p;\n\tprintf(""%s"", **p+1);\n\treturn 0;",
    "Liz baked some cookies and left them by the window to cool off.\nWhen she went back the cookies were gone and saw Jim, Reese, Chuck, and Zoey pass by. One of them took the Liz's cookies. The theif told exactly one truth and one lie.\n\nJim said it was Reese not Chuck.\nReese said it was Chuck not Jim.\nChuck said it was Zoey not Jim.\nZoey said it was Chuck not Reese.\n\nWho stole Liz's cookies?",
    "What will be the content of 'file.c' after executing the following program?\n\n\tFILE *fp1, *fp2;\n\tfp1=fopen(""file.c"", ""w"");\n\tfp2=fopen(""file.c"", ""w"");\n\tfputc('A', fp1);\n\tfputc('B', fp2);\n\tfclose(fp1);\n\tfclose(fp2);\n\treturn 0;",
      "What day comes three days after the day which comes two days after the day which comes immediately after the day which comes two days after Monday?",
      "What will be the output of the program ?\n\n\tint k=1;\n\tprintf(""%d == 1 ""is"" ""%s"", k, k==1?""TRUE"":""FALSE"");\n\treturn 0;",
      "When will you have 2>5, 5>0, 0>2, 2=2, 5=5, 0=0?",
      "What is the output of the following program?\n\n#include<stdio.h>\n#define x 4+1\n\tint main()\n\t{\n\tint i;\n\ti = x*x*x;\n\tprintf(""%d"",i);\n\treturn 0;\n\t}",
      "A donkey is behind another donkey. I'm behind that second donkey. But there is a whole nation behind me. It is a murder you can describe in a word.",
      "What is the output of the following program?\n\n\tint a = 5;\n\tint b = ++a * a++;\n\tprintf(""%d "",b);\n\treturn 0;",
      "What is greater than God,\nmore evil than the devil,\nthe poor have it,\nthe rich need it,\nand if you eat it, you'll die?",
      "Who makes it, has no need of it.\nWho buys it, has no use for it.\nWho uses it can neither see nor feel it.\nWhat is it?",
      "What has an eye but can not see?",
      "Paul's height is six feet, he's an assistant at a butcher's shop, and wears size 9 shoes. What does he weigh?",
      "There was a green house. Inside the green house there was a white house. Inside the white house there was a red house. Inside the red house there were lots of babies. What is it?",
      "Which word in the dictionary is spelled incorrectly?","If you have me, you want to share me. If you share me, you haven't got me. What am I?",
      "What gets broken without being held?","Feed me and I live, yet give me a drink and I die.","Take off my skin - I won't cry, but you will! What am I?",
      "What invention lets you look right through a wall?","What can you catch but not throw?",
      "Tanya is older than Eric.\nCliff is older than Tanya.\nEric is older than Cliff.\nIf the first two statements are true, the third statement is",
      "All the trees in the park are flowering trees.\nSome of the trees in the park are dogwoods.\nAll dogwoods in the park are flowering trees.\nIf the first two statements are true, the third statement is",
      "Mara runs faster than Gail.\nLily runs faster than Mara.\nGail runs faster than Lily.\nIf the first two statements are true, the third statement is",
      "Apartments in the Riverdale Manor cost less than apartments in The Gaslight Commons.\nApartments in the Livingston Gate cost more than apartments in the The Gaslight Commons.\nOf the three apartment buildings, the Livingston Gate costs the most.\nIf the first two statements are true, the third statement is"};
        
      char answers[35][500]={"false","false","constructor","copy constructor","false","stamp","mushroom","both","injective","hiding","ink", "Reese", "B",
      "Tuesday", "1 == 1 is TRUE", "rock, paper, scissors", "13", "assassination", "42","nothing","coffin","needle","meet","watermelon","incorrectly",
      "secret","promise","fire","onion","window","cold","false","true","false","true"};

    //randomizing thy answers
    #define ARR_SIZE(questions) ( sizeof((questions)) / sizeof((questions[0])) )
    int index;
    index = rand() % ARR_SIZE(questions);
    time_t begin, end;
    char ans[1][500];
    printf("\n%s\n\n", questions[index]);
    
    time(&begin);
    while (1){
         time(&end);
         if (kbhit()){
                     gets(ans[0]);
                     if(strcmp(ans[0], answers[index])==0){
                                       printf("\nCorrect! You have 4 moves.\n\n");
                                       *x=1;
                                       break;
                      }
                     if(strcmp(ans[0], answers[index])!=0){
                          printf("\nWrong answer!\n\n");
                          *x=2;
                          *bar=*bar-5;
                          hpbar(bar);
                          break;
                     }
         }
         if (difftime(end, begin) >= 15){
            printf("\nTime's up, loser.\n\n");
            *x=2;
            *bar=*bar-5;
            hpbar(bar);
            break;
            }
      }
}

void quit(){
     time_t begin, end;
    
    printf("______________________________\n");
    printf("|                            |\n");
    printf("|                            |\n");
    printf("|                            |\n");
    printf("|                            |\n");
    printf("|   ::::::::::::::::::::::   |\n");
    printf("|   ::                  ::   |\n");
    printf("|   :: CLOSING GAME.... ::   |\n");
    printf("|   ::                  ::   |\n");
    printf("|   ::::::::::::::::::::::   |\n");
    printf("|                            |\n");
    printf("|                            |\n");
    printf("|                            |\n");
    printf("|                            |\n");
    printf("::::::::::::::::::::::::::::::\n");
   
    time(&begin);
    while (1){
         time(&end);
         if (difftime(end, begin) >= 5){
            break;
            }
      }
}

void loading(){
 	int i;
 	char c='%';
	printf("\n");
    for(i = 0; i <=10000; i++){
    	printf("\rLoading Game....... %d%c", i/100,c);
       }
    printf("\n");
 }
 void ending(){
 	
 	printf("______________________________\n");
    printf("|                            |\n");
    printf("|                            |\n");
    printf("| :::::::::::::::::::::::::: |\n");
    printf("| ::G A M E  C L E A R E D:: |\n");
    printf("| :::::::::::::::::::::::::: |\n");
    printf("|                            |\n");
    printf("|                            |\n");
    printf("|                            |\n");
    printf("|          YOU WON!!!        |\n");
    printf("|                            |\n");
    printf("|                            |\n");
    printf("|                            |\n");
    printf("|                            |\n");
    printf("::::::::::::::::::::::::::::::\n");
 	//scanf("%d",temp);
 	//x=temp;
 	//KULANG
 }
 void gameover(){
 	
 	printf("______________________________\n");
    printf("|                            |\n");
    printf("|                            |\n");
    printf("| :::::::::::::::::::::::::: |\n");
    printf("| ::     G A M E  OVER    :: |\n");
    printf("| :::::::::::::::::::::::::: |\n");
    printf("|                            |\n");
    printf("|                            |\n");
    printf("|                            |\n");
    printf("|         YOU DIED!          |\n");
    printf("|                            |\n");
    printf("|                            |\n");
    printf("|                            |\n");
    printf("|                            |\n");
    printf("::::::::::::::::::::::::::::::\n");
 
 }

void show(char x[15][30]){
	int i;
	int j;
	printf("\n");
	for(i=0;i<15;i++){
		for(j=0;j<30;j++){
			printf("%c",x[i][j]);
		}
		printf("\n");
	}
}

void checker(char x[15][30],int ptr1,int ptr2,int *v){//Checks the move if valid/not
	char f = x[ptr1][ptr2];
	if(f==' '){
		*v=1;
	}
	else if(f=='['){
		*v=3;
	}

	else if(f==']'){
		*v=3;
	}
	else if((f!=' ')&&(f!=']')&&(f!='[')){
		*v=0;
	}

}
void left(char x[15][30],int *ptr1,int *ptr2,int *c ,char d){
	checker(x,*ptr1,*ptr2-1,c);
	if(*c==0){
		x[*ptr1][*ptr2]=d;
		show(x);
	}
	else if(*c==1){
		*ptr2=*ptr2-1;
		x[*ptr1][*ptr2]=d;
		x[*ptr1][*ptr2+1]=' ';
		show(x);
	}
	else if(*c==3){
		*ptr2=*ptr2-1;
		x[*ptr1][*ptr2]=d;
		x[*ptr1][*ptr2+1]=' ';
        ending();
        exit(0);
	}

}

void right(char x[15][30],int *ptr1,int *ptr2,int *c ,char d){
	checker(x,*ptr1,*ptr2+1,c);
	if(*c==0){
		x[*ptr1][*ptr2]=d;
		show(x);
	}
	else if(*c==1){
		*ptr2=*ptr2+1;
		x[*ptr1][*ptr2]=d;
		x[*ptr1][*ptr2-1]=' ';
		show(x);
	}
	else if(*c==3){
		*ptr2=*ptr2+1;
		x[*ptr1][*ptr2]=d;
		x[*ptr1][*ptr2-1]=' ';
        ending();
        }
}

void up(char x[15][30],int *ptr1,int *ptr2,int *c ,char d){
	checker(x,*ptr1-1,*ptr2,c);
	if(*c==0){
		x[*ptr1][*ptr2]=d;
		show(x);
	}
	else if(*c==1){
		*ptr1=*ptr1-1;
		x[*ptr1][*ptr2]=d;
		x[*ptr1+1][*ptr2]=' ';
		show(x);
	}
	else if(*c==3){
		*ptr1=*ptr1-1;
		x[*ptr1][*ptr2]=d;
		x[*ptr1+1][*ptr2]=' ';
        ending();
	}

}

void down(char x[15][30],int *ptr1,int *ptr2,int *c,char d){
	checker(x,*ptr1+1,*ptr2,c);
	if(*c==0){
		x[*ptr1][*ptr2]=d;
		show(x);
	}
	else if(*c==1){
		*ptr1=*ptr1+1;
		x[*ptr1][*ptr2]=d;
		x[*ptr1-1][*ptr2]=' ';
		show(x);
	}
	else if(*c==3){
		*ptr1=*ptr1+1;
		x[*ptr1][*ptr2]=d;
		x[*ptr1-1][*ptr2]=' ';
        ending();
	}
}

void pos(int *x,int *y,char z[15][30],char t){//Initial position of players
	z[*x][*y]=t;
}
main(){
	int *ptr1;//Pointer for  Row of player 1
	int *ptr2;//Pointer for  Column of player 1
	int *temp;// Value for the function checker
	char *g;// Address of the goal
	char *g1;// Address of the goal
	int *op;// Value for summoning question 
	int *ptrhp;
	op=&e;
	temp=&d;
	ptr1=&x1;
	ptr2=&x2;
	ptrhp=&hp;
	g=&maze[7][14];
	g1=&maze[7][15];

	while(l!=3){

		
		printf("______________________________\n");
        printf("|                            |\n");
        printf("|                            |\n");
        printf("|                            |\n");
        printf("|      ::::::::::::::::      |\n");
        printf("|      ::    M O Q   ::      |\n");
        printf("|      ::::::::::::::::      |\n");
        printf("|                            |\n");
        printf("|       [1] START GAME       |\n");
        printf("|       [2] HOW TO PLAY      |\n");
        printf("|       [3] QUIT             |\n");
        printf("|                            |\n");
        printf("|                            |\n");
        printf("|                            |\n");
        printf("::::::::::::::::::::::::::::::\n");
		scanf("%d",&l);
		if(l==1){
			loading();
			*ptr1=7;
			*ptr2=16;
			*temp=0;
			*op=2;
			*g='[';
			*g1=']';
			pos(ptr1,ptr2,maze,x);
			show(maze);
			while(d!=3){

		       while(*op==2){
                  if(*ptrhp==0){
                     *temp=3;
                     *op=3;
                     break;
                     }
                  if(*ptrhp!=0){
                      printf("\nQuestion:\n");
                      questions(op,ptrhp);
                      break;
                  }
                }
         
		       if(e==1){//IF the player answer the question correctly
    		       show(maze);
    		       for(z=1;z<5;){//Sets the limit for the number of moves the player can
    				scanf("%c",&p);
    				if(p=='w'){
    					up(maze,ptr1,ptr2,temp,x);
    					z=z+1;
    					if(z!=5){
							printf("\nMove:");
                        }
    				}
    				else if(p=='a'){
    					left(maze,ptr1,ptr2,temp,x);
    					z=z+1;
    					if(z!=5){
							printf("\nMove:");
                        }
    				}
    				else if(p=='s'){
    					down(maze,ptr1,ptr2,temp,x);
    					z=z+1;
    					if(z!=5){
							printf("\nMove:");
                        }
    				}
    				else if(p=='d'){
    					right(maze,ptr1,ptr2,temp,x);
    					z=z+1;
    					if(z!=5){
							printf("\nMove:");
                        }
    				}
	            }
	            *op=2;
              }
              if(e==3){
                       gameover();
                       break;     
              }
              else{// If player got a wrong answer or time's up
                     *op=2;
              }
              }
		}
		if(l==2){
            printf("\n*********************************************************************************\n");
			printf("*\t\t\t\t\t\t\t\t\t\t*\n*\t\t\t\t\t\t\t\t\t\t*\n*\t\t\t\tHOW TO PLAY\t\t\t\t\t*\n*\t\t\t\t\t\t\t\t\t\t*\n*\t\t\t\t\t\t\t\t\t\t*\n*");
            printf("        \tThe player is bound to finish the maze by answering questions, \t*\n*     riddles, and logic puzzles. Some of the questions are related to \t\t*\n*     "); 
            printf("Computer Science.\t\t\t\t\t\t\t\t*\n*\t\t\t\t\t\t\t\t\t\t*\n*");
            printf("     1. A player is given a 100 percent life at the beginning of the game.\t*\n*\t\t\t\t\t\t\t\t\t\t*\n*     2. If a player answers a question correctly, she/he can move 4 times\t*\n*");
            printf("        (up, down, left, right) depending on which direction will lead\t\t*\n*        her/him to the finish line faster.\t\t\t\t\t*\n*\t\t\t\t\t\t\t\t\t\t*\n*");
            printf("     3. If a player answers a question incorrectly, her/his life will\t\t*\n*        decrease by 5 percent.\t\t\t\t\t\t\t*\n*\t\t\t\t\t\t\t\t\t\t*\n*");
            printf("     4. The player will win the maze by the time she/he reaches the\t\t*\n*        end of the maze (of course), depicted by [].\t\t\t\t*\n*\t\t\t\t\t\t\t\t\t\t*\n*");
            printf("     5. However, there is a 15-second limit for the player to answer a\t\t*\n*        given question. Failure to answer a question will lead to reduction    *\n*        of life as well.\t\t\t\t\t\t\t*\n*\t\t\t\t\t\t\t\t\t\t*");
            printf("\n*\t\t\t\t\t\t\t\t\t\t*\n*\t\t\t\tCONTROLS:\t\t\t\t\t*\n*\t\t\t\t\t\t\t\t\t\t*\n*\t\t\t\tUP - [W]\t\t\t\t\t*\n*\t\t\t\tDOWN - [S]\t\t\t\t\t*\n*\t\t\t\tLEFT - [A]\t\t\t\t\t*\n*\t\t\t\tRIGHT - [D]\t\t\t\t\t*\n*\t\t\t\t\t\t\t\t\t    EXIT*\n*");
            printf("********************************************************************************\n\n");
	        }
	        
		if(l>3){
			printf("\nInvalid input. Try again.\n");
	        }
	}
	quit();
}

