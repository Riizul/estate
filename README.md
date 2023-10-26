# EB Estate 
Real Estate Site

# To do
- add editor on content builder paragraph
    * edit page (done & deployed)
    * create page 
- error content builder enumeration
- update property creation
- image resize feature
- content editor add option for break line


# Production
Run script 
- php artisan storage:link

## Deployment
:: process
https://www.youtube.com/watch?v=BHAdDFtgYo0

:: 1st
copy files inside the development public folder to hosting public_html folder

:: 2nd
- in the public_html folder
- create new folder [parser] 
- copy the remaining files in the development except for the [public] folder

:: 3rd
- create database in the host server
- modify the .env file

APP_URL=https://datparse.com/ebeye
 
DB_DATABASE=u210120070_estate
DB_USERNAME=u210120070_estate
DB_PASSWORD=_RealEst@t3

::4th
open the root directory of your project then open index.php
and update all directory with correct value

"/[APP FOLDER NAME]/storage/framework/maintenance.php"

::5th
run command SSH
ln -s "[source directory]" "[target directory]"

example:
ln -s "/home/u885205984/domains/ebeyejane.com/public_html/parser/storage/app/public" "/home/u885205984/domains/ebeyejane.com/public_html/storage"
 