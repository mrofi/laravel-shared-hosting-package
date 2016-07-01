# Laravel Shared Host Package

## This simple package will help you to deploy laravel framework in shared hosting

## Strong Warning
It's not recommended to deploy your app in share hosting, so you know with what you do.


## How It Works
we create a index.php to base directory, so you can access your app without /public and overrides how laravel do with public assets. Make sure you use asset() helper to include your asset files in app.

## How To

````
    composer require mrofi/laravel-shared-hosting-package "dev-master"
````

add this to your config/app.php file :
````
    ...
    Mrofi\LaravelSharedHostingPackage\LaravelSharedHostingPackageServiceProvider::class,
    ...
````
then, do some magic :
````
    php artisan vendor:publish
````

## Security 

Please read how to configure server to make your server secure. Since you move your index.php to base path directory you have to hide other folders like : app, migrations, resources, etc from direct access by browser.

