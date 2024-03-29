# DiabloDB #
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/taskforcedev/DiabloDB/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/taskforcedev/DiabloDB/?branch=master)
[![Codacy Badge](https://www.codacy.com/project/badge/670448d59df045c783baee6735870004)](https://www.codacy.com/public/taskforce2eu/DiabloDB)
[![Build Status](https://travis-ci.org/taskforcedev/DiabloDB.svg?branch=master)](https://travis-ci.org/taskforcedev/DiabloDB)

DiabloDB is a character database aimed at clans and communities which lists characters in a sortable/filterable list.

## Project Status ##

DEVELOPMENT - We do not currently recommend using the application on live servers, though testing would be appreciated.

This project is still in the relatively early stages of development, if you would like to help contribute please get in touch.

## Documentation ##
Documentation can also be found [here](http://diablodb.readthedocs.org/)

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

### Manual ###

> Currently only the manual method for updating members/characters has been tested, use the steps below to do this.
>
> To update members (which adds members characters to the database)
>
> <code>php artisan members:update</code>
>
> This will call the battlenet api with the members battletags and return data such as paragon levels, characters, etc.
>
> Following this you can then call
>
> <code>php artisan characters:update</code>
>
> Which will update each character individually and update their stats (health, damage, gold find, etc).
