# DiabloDB #
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/taskforcedev/DiabloDB/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/taskforcedev/DiabloDB/?branch=master)

DiabloDB is a character database aimed at clans and communities which lists characters in a sortable/filterable list.

## Project Status ##

DEVELOPMENT - We do not currently recommend using the application on live servers, though testing would be appreciated.

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

Open up config/diablo.php

Under 'battlenet':

* Edit the sitename to your community name (or whatever you would like to appear in the header).
* Check your region and locale settings.
* Enter your API Key (which can be obtained by registering on the blizzard dev portal [here](https://dev.battle.net/) if you do not already have one)

## Updating Members/Characters ##

There are several options for updating members and characters: Cron, Queue, Manual

### Cron ###

> In the config/diablo.php file there are some settings for scheduling characters and members updating, to make these work you will need to add a cron job on your server to run the following
> 
> `* * * * * bash -c "cd /path/to/diablodb && php artisan schedule:run"`
> 
> valid options for the config file are:
> 
> * everyFiveMinutes
> * everyTenMinutes
> * everyThirtyMinutes
> * hourly
> * daily
> * weekly
> * monthly
> * yearly

### Queue ###

> TBC

### Manual ###

> Members and Characters updates can be triggered manually.  However we recommend using either a cron or queue for general hourly/daily updating etc 