# Toolman
•Course name: Web Computing and Web Systems
•Group name: Toolman
•Member 1: Run Zhang (zhangr75) 400075768
•Member 2: Boming Jin (jinb5) 400179701
•Live Server: https://toolman.works/Toolman/
              https://github.com/zhangr75/Toolman

All .js files are in javascript folder.
All media files are in images folder.
We used Animate.css as library.
All useful .php backend files are in php folder.

We did add-on tasks. Users who logged in could able to submit reviews and refresh the part of the page(not the whole page)

We used PHP Data Object(PDO) API for database access.

Each input/textarea place is validated in the backend and frontend

Also, S3 bucket is working properly, and we put images into the bucket and store the URL of the images in the database. Users could see the image if they upload the image and those images will show on the result of the searching things.

We done the ssl things but don't know why the domain name not working stably.


Instructions:

we prepopulated 5 restraurants in the databse for searching, whcih are "soyummy, Coco milktea, The Ship, The Alley, August 8". Users should input exact name or rate of restaurants for searching restaurants properly. If want to search based on rate, then do not enter anything into input box. One/Multiple restaurants will all showed on the left side of the page(include one image if they uploaded for that restaurant), and markers will showed up on the map. On the top right corner when use logged in the icon will trun into "Log Out", and if not logged in, the icon is showing "Log In" and lead to the log in page.

For individual object page reviews, coords, marker will showed properly, users could submit the review on the same page at the end of the leftside. Success messages or fail messages will showed after submission. Used ajax to render the page partially.

On the submission page, only logged in user could sbumit new object, user could submit image to the S3 bucket. Right click will choose the coordinate on the map directly(the coords will auto filled in the proper input).

For registration page, usre could sign up or log in in the different page, and message will show if the action is success or fail.
