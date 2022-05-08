# RESTful API Code Challenge


This is a laravel Lumen framework application. I used lumen-passport for authentication by generating tokens and handle authentication sessions.

## To run the project

1. Clone project
2. Run  **composer install**
3. Set up your database, create your .env file and provide the db_name and user credentials
4. Run **php artisan key:generate** 
5. Run **php artisan migrate** to create the tables in the database
6. Run **php artisan passport:install** to create client ID's for the application
7. Run **php artisan db:seed** to populate the user table
8. Run **php artisan serve** to start the application

## Testing the endpoints

I used insomnia to test the endpoints.
If you are using insomnia, you can just import the Helix_coding_challenge file and the endpoints will be imported

## Security Vulnerabilities

If you discover a security vulnerability within Lumen, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Lumen framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
