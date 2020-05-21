[Index](readme.md) > Installation

# Installation

Require the package:

    composer require realsoft/lacruda

Publish the nav view, CSS, & JS files:

    php artisan vendor:publish --tag=install

Integrate the auth scaffolding:

    php artisan lacruda:auth
