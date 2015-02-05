# DiabloDB #

DiabloDB is a character database aimed at clans and communities which lists characters in a sortable/filterable list.

## Development Status ##

This project is still in the relatively early stages of development, if you would like to help contribute please get in touch.

## Requirements ##

The database uses Laravel framework so the requirements of that apply, we recommend a minimum of PHP 5.5

## Installation ##

* Download the files to the appropriate root folder
* Run a "composer install" to get required dependencies.
* Create a .env file (copy .env.example and copy in your db details) or you can edit app/config/database.php if required.
* run "php artisan migrate"
* run "php artisan db:seed"
* Open the app in your browser and go to /register and create your account.
* run "php artisan role:assign" select your user account and the administrator role (should be 2).

At this point you should be set up as an administrator on the application, please visit /admin to test this step worked.

## Configuration ##

After installation we recommend you then configure your clan settings if you wish for characters to be automatically polled from the blizzard servers.

You will find these settings in app/config/diablo.php, here you will also be able to edit the site(community) name etc.
