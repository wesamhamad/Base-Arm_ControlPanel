# Base&Arm_ControlPanel

A project for SmartMethods Internship, the software development process of a robotic base&arm.

-First, I designed a Web page to control the Base of arm  , API (Application Programming Interface) using html, css, javascript to controls the movement of the base, then I combined the two web pages into one page to make it easy to a user to controol both at the same page. 

   ![page](https://user-images.githubusercontent.com/74800962/123559044-6b4fd580-d7a2-11eb-844a-1481df0785cf.gif)
   
Also, I add a helpful additions which are : 
   
  1- Number boxes shows the last saved value.
  
  2- Bouttons to choose some special angles (180-90-45-30) and to reset (0) .
  
  3- The last Engine can be hidden .
   
   ![addition](https://user-images.githubusercontent.com/74800962/123559271-adc5e200-d7a3-11eb-8abd-e082046f1ea8.gif)
 
-After that I designed a database with table(Direction) and I previously add the (Engines,Run) tables then I conected it with the Interface to insert values of each engine, direction and where it on  into corresponding columns of the table.

![dbd](https://user-images.githubusercontent.com/74800962/123559503-0a75cc80-d7a5-11eb-9ad5-fe360c75a219.gif)
 ![db](https://user-images.githubusercontent.com/74800962/123559536-4315a600-d7a5-11eb-8631-797859fea187.gif)


These  tasks are in base.php file and ROBOT_CONTROLLERS.sql

-Then I designed 3 Web pages to display the last record inserted in Directions,Engines and Run tables which contained the value of the Direction which the last user choosen.
-Directions.php- 

![responsive](https://user-images.githubusercontent.com/74800962/123560139-3a26d380-d7a9-11eb-953f-43e001fd4afe.gif)

-Engines.php- 

![Engines](https://user-images.githubusercontent.com/74800962/122818802-5080eb00-d2e2-11eb-9824-ffd2ead859c7.gif)

-Run.php- 

![Run](https://user-images.githubusercontent.com/74800962/122818511-f97b1600-d2e1-11eb-9ba0-d4201c614be3.gif)


-Finally, I made the web page responsive to a Tablets and mobile phones .

![Responsive_pages](https://user-images.githubusercontent.com/74800962/123561022-af48d780-d7ae-11eb-8f76-4027035c11c3.gif)

I use XAMPP to host my web pages on a localhost.

While I was developing I faced two problems,which are: 

1-(span element) which have value of range slider doesn't show the value while I move it on mobile view, I found that onmousemove event is the source of problem so, I use onchange (for mobile and tablet pages) & onmouseover (for desktop page).

2-The value of range slider doesn't change when I click any of special angeles buttons, I tried untill finally solved it by connect the slider value (span element) with the input type "number" and then connect the it whith buttons.

A Pen created on CodePen.io. Original URL: https://codepen.io/wesam_aljuriash/pen/ZEKzwGo
