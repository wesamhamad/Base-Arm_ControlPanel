# Base-Arm_ControlPanel

A project for SmartMethods Internship, the software development process of a robotic base&arm.

-Firest, I designed a Web page to control the Base of arm  , API (Application Programming Interface) using html, css, javascript to controls the movement of the base .

-Then I copmined the two web pages into one page to make it easy to a user to controol both at the same page. 


   ![page](https://user-images.githubusercontent.com/74800962/123559044-6b4fd580-d7a2-11eb-844a-1481df0785cf.gif)
   
Also, I add a helpful additions which are : 
   
  1- Text box show the last saved value.
  
  2- Bouttons to choose some special angles and to reset .
  
  3- The last Engine can be hidden .
   
   ![addition](https://user-images.githubusercontent.com/74800962/123559271-adc5e200-d7a3-11eb-8abd-e082046f1ea8.gif)
 
-After that I designed a database with one tables(Direction) and I previously add the (Engines,Run) tables then I conected it with the Interface to insert values of each engine, direction and where it on  into corresponding column of the table.

![dbd](https://user-images.githubusercontent.com/74800962/123559503-0a75cc80-d7a5-11eb-9ad5-fe360c75a219.gif)
 ![db](https://user-images.githubusercontent.com/74800962/123559536-4315a600-d7a5-11eb-8631-797859fea187.gif)



These  tasks are in base.php file and ROBOT_CONTROLLERS.sql

-Then I designed a Web page -Directions.php- to display the last record inserted in Directions table which contained the value of the Direction which the last user choosed.

![Run](https://user-images.githubusercontent.com/74800962/122818511-f97b1600-d2e1-11eb-9ba0-d4201c614be3.gif)


-Finally, I made the web page responsive to a Tablets and mobile phones .

![Engines](https://user-images.githubusercontent.com/74800962/122818802-5080eb00-d2e2-11eb-9824-ffd2ead859c7.gif)


A Pen created on CodePen.io. Original URL: https://codepen.io/wesam_aljuriash/pen/ZEKzwGo
