# **LA**ravel **CRUD** **A**JAX (LACRUDA) Docs

**LACRUDA** is a **Laravel 7** package designed to integrate beautifully while saving you tons of time. Get a complete CRUD interface done in minutes by adding a few lines of code to your models.

**Features include:**

- Full **Laravel 7** auth & resource integration
- Unobtrusive implementation to keep you in control
- Field, action, & bulk action helper classes
- Scaffolding command to create files for you
- Intuitive, responsive UI design
- AJAX validation & responses
- Ease of use and customization

**Links of interest:**

- [Docs](https://github.com/real-soft/lacruda/blob/master/docs/readme.md)
- [Support](https://github.com/realsoft/lacruda/issues)
- [Contributions](https://github.com/realsoft/lacruda/pulls)
- [Buy me a coffee](https://ko-fi.com/realsoft)

# Installation

Require the package:

    composer require realsoft/lacruda

Publish the nav view, CSS, & JS files:

    php artisan vendor:publish --tag=install

Integrate the auth scaffolding:

    php artisan lacruda:auth

# Quick Start

Make scaffolding files for a new model (a `Vehicle`, for example):

    php artisan lacruda:make Vehicle

Update the `LacrudaField`s in the new `Vehicle` model class:

    public function fields()
    {
        return [
            LacrudaField::make('ID')
                ->tableColumn()->tableSearchable()->tableOrder('desc'),

            LacrudaField::make('Brand')
                ->tableColumn()->tableSearchable()->tableSortable()
                ->input()->inputCreate()->inputEdit()
                ->rules(['required']),

            LacrudaField::make('Color')
                ->tableColumn()->tableSearchable()->tableSortable()
                ->inputSelect(['Red', 'Green', 'Blue'])->inputCreate()->inputEdit(),

            LacrudaField::make('Created At')
                ->tableColumn()->tableSearchable()->tableHidden(),

            LacrudaField::make('Updated At')
                ->detailsHidden(),
        ];
    }

Update the new `*_create_vehicles_table` migration file with your field columns:

    Schema::create('vehicles', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->string('brand');
        $table->string('color')->nullable();
        $table->timestamps();
    });

Run the migration:

    php artisan migrate

Log into your app with any auth `User` and click the `Vehicles` link in the navbar to view the CRUD.

[Learn more in the docs](https://github.com/real-soft/lacruda/blob/master/docs/readme.md).
