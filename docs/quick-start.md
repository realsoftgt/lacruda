[Index](readme.md) > Quick Start

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
