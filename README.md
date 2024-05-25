# EB Estate 
Real Estate Site

# To do
* 05-24-2024
- localize filepone js libraries
- remove temp solution to handle image optimization on affected screens once find solution to force run optimization of uploaded images
- trace code "BTK::"
* 04-27-2024
- Make site display optimize images 
- Share buttons
- Add send message
- optimize image upload
    > image resize feature
✓ Search property
✓ Property viewing screen remove black header when scrolled
- Content builder 
    > paragraph 
        ✓ add font size
    > add capability to content section by column
- create property check if slug already exist 
    - if yes rename slug of delete property
    - else prompt that slug already taken

# Production
Run script 
- php artisan storage:link

## Deployment
# Version 2 / advisable
REF : https://www.youtube.com/watch?v=LPKRqeqoayM

:: Add .htaccess file
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteRule ^(.*)$ public/$1 [L]
</IfModule>

:: Link storage
run command SSH
ln -s "[source directory]" "[target directory]"

example:
ln -s "/home/u885205984/domains/ebeyejane.com/public_html/storage/app/public" "/home/u885205984/domains/ebeyejane.com/public_html/public/storage"
 

# Version 1
REF : https://www.youtube.com/watch?v=BHAdDFtgYo0

# process
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
 