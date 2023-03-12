<h1>MOVIE APP TMDB</h1>

This project is a Laravel-based web application designed to let users browse the latest Movies/Tv shows, stream trailers and leave comments.

<h4>Getting Started</h4>
These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

<span>Prerequisites</span>

-   PHP: Laravel requires PHP version 7.3 or higher installed on your system. You can check your PHP version by running php -v command in your terminal or command prompt.

-   Composer: Laravel uses Composer, a dependency manager for PHP, to manage its dependencies. You can download and install Composer from the official website https://getcomposer.org/.

-   Web Server: Laravel requires a web server to run the application. You can use popular web servers like Apache, Nginx, or the built-in PHP web server to serve your Laravel application.

-   Database: Laravel supports various database systems, including MySQL, PostgreSQL, SQLite, and SQL Server. You should have at least one of these databases installed on your system.

Copy the .env.example file to .env and update the database configuration settings.
Configure your databse environment variables and the TMDB_API_KEY & GOOGLE_API_KEY as well in .env file
Please run npm install && npm run dev

<span>Installation :</span>
 Clone this repository to your local machine.
 Run composer install to install the required dependencies.
 Generate a new application key by running php artisan key:generate.
Migrating the database

In your terminal cd to your project root and :
php artisan migrate

Creating an account

App\Models\User::create(['name'=>'NAME','email'=>'EMAIL','password'=>bcrypt("PASSWORD")]);
Or just go to /register to create an account

Built With
Laravel - The web framework used
Composer - Dependency Management
MySQL - Database Management System

Author : MERABET Faycal
please note that this app is not fully optimised for small size screens you will find some pages that needs fixing

License
This project is licensed under the MIT License - see the LICENSE.md file for details

<h1>Project summary</h1>

-   [x] As a user, I should be able to create an account with a username and a password
-   [x] As a user, I should be able to view the list of movies and series on different pages
-   [x] As a user, I should be able to view the list of the top 5 movies/series in a dedicated section on the movies and series pages
-   [x] As a user, I should be able to view, on the movies and series pages, all the movies/series available in batches of 10
-   [x] As a user, I should be able to search for movies and series
-   [x] As a user, I should be able to consult the details of a movie or a series
-   [x] As a user, I should be able to watch the trailer of a movie or a series
-   [ ] The App should have better styling
-   [ ] Adding a 404 page
-   [ ] Bug fix , some trailer ids retreived from TMDB API doesn't exist on YT altho the platform mentioned for those Moves/Tv Shows
        is Youtube. (offset 0 , and can't retreive uri ... ) should redirect to a page that says , Sorry this Movie is not yet available instead.
-   [x] Bonus! : As a user, I should be able to leave comments
-   [ ] Optimizing the App for smaal screen devices

<h1>Routes</h1>

+--------+----------+-------------------------+------------------+------------------------------------------------------------------------+---------------------------------------------+
| Domain | Method | URI | Name | Action | Middleware |
+--------+----------+-------------------------+------------------+------------------------------------------------------------------------+---------------------------------------------+
| | GET|HEAD | / | | Closure | web |
| | GET|HEAD | api/user | | Closure | api |
| | | | | | App\Http\Middleware\Authenticate:sanctum |
| | GET|HEAD | home | home | App\Http\Controllers\HomeController@index | web |
| | GET|HEAD | login | login | App\Http\Controllers\Auth\LoginController@showLoginForm | web |
| | | | | | App\Http\Middleware\RedirectIfAuthenticated |
| | POST | login | | App\Http\Controllers\Auth\LoginController@login | web |
| | | | | | App\Http\Middleware\RedirectIfAuthenticated |
| | POST | logout | logout | App\Http\Controllers\Auth\LoginController@logout | web |
| | GET|HEAD | movies | browse | App\Http\Controllers\MoviesController@index | web |
| | GET|HEAD | movies/{id} | movies.show | App\Http\Controllers\MoviesController@show | web |
| | POST | movies/{movie}/comments | comments.store | App\Http\Controllers\MoviesController@store | web |
| | GET|HEAD | password/confirm | password.confirm | App\Http\Controllers\Auth\ConfirmPasswordController@showConfirmForm | web |
| | | | | | App\Http\Middleware\Authenticate |
| | POST | password/confirm | | App\Http\Controllers\Auth\ConfirmPasswordController@confirm | web |
| | | | | | App\Http\Middleware\Authenticate |
| | POST | password/email | password.email | App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail | web |
| | GET|HEAD | password/reset | password.request | App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm | web |
| | POST | password/reset | password.update | App\Http\Controllers\Auth\ResetPasswordController@reset | web |
| | GET|HEAD | password/reset/{token} | password.reset | App\Http\Controllers\Auth\ResetPasswordController@showResetForm | web |
| | POST | register | | App\Http\Controllers\Auth\RegisterController@register | web |
| | | | | | App\Http\Middleware\RedirectIfAuthenticated |
| | GET|HEAD | register | register | App\Http\Controllers\Auth\RegisterController@showRegistrationForm | web |
| | | | | | App\Http\Middleware\RedirectIfAuthenticated |
| | GET|HEAD | sanctum/csrf-cookie | | Laravel\Sanctum\Http\Controllers\CsrfCookieController@show | web |
| | GET|HEAD | search | search | App\Http\Controllers\SearchController@search | web |
| | GET|HEAD | tv | browsetv | App\Http\Controllers\TvShowController@index | web |
| | GET|HEAD | tv/{id} | tvshows.show | App\Http\Controllers\TvShowController@show | web |
+--------+----------+-------------------------+------------------+------------------------------------------------------------------------+---------------------------------------------+
