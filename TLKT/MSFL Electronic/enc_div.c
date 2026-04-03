/////////////////////////////////////////////////////////////////////////
////                         EX_hall_q.C                               ////
////                                                                 ////
////  This example demonstartes the use of the built in comparator.  ////
////  The program compares the input voltage with the internal       ////
////  reference voltage.  Turn pot #9 to change the voltage.         ////
////                                                                 ////
////  Configure the CCS prototype card as follows:                   ////
////     Connect pin 16 to pin 27.                                   ////
////     Connect pin 9 to pin 15.                                    ////
////     See additional connections below.                           ////
////                                                                 ////
////  NOTE: Make sure the #9 pot is turned all the way counter clock ////
////  wise before starting the program.                              ////
////                                                                 ////
////  This example will work with the PCM compiler.  The following   ////
////  conditional compilation lines are used to include a valid      ////
////  device for each compiler.  Change the device, clock and RS232  ////
////  pins for your hardware if needed.                              ////
/////////////////////////////////////////////////////////////////////////
////        (C) Copyright 1996,2003 Custom Computer Services         ////
//// This source code may only be used by licensed users of the CCS  ////
//// C compiler.  This source code may only be distributed to other  ////
//// licensed users of the CCS C compiler.  No other use,            ////
//// reproduction or distribution is permitted without written       ////
//// permission.  Derivative programs created using this software    ////
//// in object code form are not restricted in any way.              ////
/////////////////////////////////////////////////////////////////////////


#if defined(__PCM__)
#include <12F675.h>
#device ADC=10
//#fuses INTRC_IO,WDT,PROTECT,NOMCLR
#fuses INTRC_IO,PROTECT,NOMCLR
#use delay(clock=4000000)
//#use fixed_io(a_outputs=PIN_A0, PIN_A2)
//#use rs232(baud=9600, parity=E, xmit=PIN_A5, rcv=PIN_A3)
#endif



//short safe_conditions=TRUE;

int16 Pb=512,temp=2;

int16 mm_bm=512,Vref=512,tens=0,i=0;
int8  button = 1,cc=0;  
//float timing = 0;
int8 half =0, temp8=0;
const int 
a[]=
 {            
0,
3 , 
6,
9 , 
13 ,  
16,
19 ,  
22,
25 ,  
27,
30 ,  
33,
36 ,  
38,
41 ,  
43,
46 ,  
48,
50 ,  
53,
55 ,  
57,
59 ,  
62,
64 ,  
66,
68 ,  
70,
72 ,  
74,
75 ,  
77,
79 ,  
81,
83 ,  
84,
86 ,  
88,
89 ,  
91,
93 ,  
94,
96 ,  
97,
99 ,  
100 ,   
102,
103 ,   
104,
106 ,   
107,
109 ,   
110,
111 ,   
112,
114 ,   
115,
116 ,   
117,
119 ,   
120,
121 ,   
122,
123 ,   
124,
125 ,   
127,
128 ,   
129,
130 ,   
131,
132 ,   
133,
134 ,   
135,
136 ,   
137,
138 ,   
138,
139 ,   
140,
141,
142 ,   
143,
144 ,   
145,
146 ,   
146,
147 ,   
148,
149 ,   
150,
150 ,   
151,
152 ,   
153,
153 ,   
154,
155 ,   
156,
156 ,   
157,
158 ,   
158,
159 ,   
160,
161 ,   
161,
162 ,   
163,
163 ,   
164,
164 ,   
165,
166 ,   
166,
167 ,   
168,
168 ,   
169,
169 ,   
170,
170 ,   
171,
172 ,   
172,
173 ,   
173,
174 ,   
174,
175 ,   
175,
176 ,   
176,
177 ,   
177,
178 ,   
178,
179 ,   
179,
180 ,   
180,
181 ,   
181,
182 ,   
182,
183 ,   
183,
184 ,   
184,
185 ,   
185,
185 ,   
186,
186 ,   
187,
187 ,   
188,
188 ,   
188,
189 ,   
189,
190 ,   
190,
190 ,   
191,
191 ,   
192,
192 ,   
192,
193 ,   
193,
193 ,   
194,
194 ,   
195,
195 ,   
195,
196 ,   
196,
196 ,   
197,
197 ,   
197,
198 ,   
198,
198 ,   
199,
199 ,   
199,
200 ,   
200,
200 ,   
201,
201 ,   
201,
202 ,   
202,
202 ,   
202,
203 ,   
203,
203 ,   
204,
204 ,   
204,
204 ,   
205,
205 ,   
205,
206 ,   
206,
206 ,   
206,
207 ,   
207,
207 ,   
208,
208 ,   
208,
208 ,   
209,
209 ,   
209,
209 ,   
210,
210 ,   
210,
210 ,   
211,
211 ,   
211,
211 ,   
212,
212 ,   
212,
212 ,   
213,
213 ,   
213,
213 ,   
213,
214 ,   
214,
214 ,   
214,
215 ,   
215,
215 ,   
215,
216 ,   
216,
216 ,   
216,
216 ,   
217};
         

//#INT_COMP
//void isr()  {

//temp = getc();
//temp += 512;
//Vref = temp;
  
//}

/*#INT_EXT
void ex0_isr(){
 if(input(PIN_A4)){    
    temp++;
    if(temp == 25) temp = 24;
 } 
 else {
    temp--;
    if(temp == 0xff) temp = 0;
 }   

}*/
#INT_TIMER0
void isr_timer0(void){

set_timer0(half); 
output_bit( PIN_A4, ~input(PIN_A4));
  
}

/*
void ReadFromFlash(){


temp=read_eeprom(0);
Vref = 512 + temp;
if(temp > 33) {
   Vref = 514;
   temp = 2;
}

}

void WriteToFlash(){
write_EEPROM(0,temp);



}

*/

main()   {

   // Timer 0 : 8 bit Calculation :
   //Delay=((256-InitTMRO)*Prescaler) / Frenquency/4)   
   // InitTMR0 : set_timer0(InitTMR0)
   // Prescaler : RTCC_DIV_1,RTCC_DIV_2....
   //Frenquency : 4MHz
   //delay= 1*(256 - 6)*1us = 250us
   // delay minimum = 32us
   // InitTMR0 maximum =224
   enable_interrupts(INT_RTCC);
   enable_interrupts(GLOBAL);
   setup_timer_0(RTCC_INTERNAL|RTCC_DIV_1);
   
   
   // set_timer0(6);
   //enable_interrupts(INT_COMP);
   //ext_int_edge( H_TO_L );   // Sets up EXT
   //enable_interrupts(INT_EXT);
   
   
   
   setup_adc(  ADC_CLOCK_INTERNAL  );

   setup_adc_ports(AN0_ANALOG|AN1_ANALOG|AN2_ANALOG);
   
   
   //set_adc_channel(1);
  
   //ReadFromFlash(); 
   
   while(TRUE)
   {
             
      set_adc_channel(2);
      delay_us(20);
      tens = read_adc(); 
         
      set_adc_channel(0);
      delay_us(20);
      mm_bm = read_adc();
            
      set_adc_channel(1);
      delay_us(20);
      Vref = read_adc();
                 
      if(mm_bm > (Vref+1)){
            
         output_high(PIN_A5);
         
      }
      else   output_low(PIN_A5);
      
          
      tens =  tens>>2; 
      temp8 = tens;
      
      //timing = 5267*half/255 + 1733;
      
      //timing = 5267*tens/255;
      //timing /= 255;
      //timing *= half;
      //timing += 1733;
      
     // timing =500000/timing;
     // timing = 289 - timing + 0.5;
     // half = (unsigned int)timing; 
      half = a[temp8];
      /*i++;
      if(i>100) {
      i=0;
      putc(half);
      } */       
    //  if (half >224) {
    //  half =224;
     // }  
     
      
     }
}

