# RESTful API Code Challenge


This is a laravel Lumen framework application. I used lumen-passport for authentication by generating tokens and handle authentication sessions.

## Setting up the project

1. Clone project
2. Run  **composer install**
3. Set up your database, create your .env file and provide the db_name and user credentials
4. Run **php artisan key:generate** 

## Running the tests
1. Run phpunit with the command ***.\vendor\bin\phpunit.bat***

## Running the project
1. Run **php artisan migrate:fresh** to create the tables in the database
2. Run **php artisan passport:install** to create client ID's for the application
3. Run **php artisan db:seed** to populate the user table
4. Run **php artisan serve** to start the application



## API Endpoints/ Documentation
To get a list of the API Endpoints,
1. change directory into api_docs
2. run ***npx serve***

This will serve the api documentation on a link and then open it in your browser.


## Testing the endpoints

I used insomnia API Client to test the endpoints.
If you are using insomnia, you can just import the Helix_coding_challenge file and the endpoints will be imported
