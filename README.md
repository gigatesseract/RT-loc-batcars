# RT-loc-batcars

### Real time location of battery cars in NIT trichy for easy mobility 
##### Run:-

1. Install WAMP server. markRun it. 
1. Open MySQL console and run the following command:- 
GRANT ALL ON ``*.*`` TO 'pc'@'localhost';
1. Clone the repository in the ``www`` folder of the root directory.
1. Open browser and run localhost

##### Navigation:- 

1. Three types of login-systems:- Server, Student, Battery-car operator
1. Server:- Master access.(UNder construction)
2. Battery-car Operator:- WHen logged in as battery car operator, your location (if permission is granted) will be updated in the database. You get to choose the route through which you are going to travel
3. Student:- Views the real-time location of battery cars that are logged in with their predefined routes as popups. Optional "request" button under construction
