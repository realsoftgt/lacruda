<?php

namespace RealSoft\Lacruda\Traits;

use Illuminate\Support\Facades\Schema;
use RealSoft\Lacruda\Components\LacrudaAction;
use RealSoft\Lacruda\Components\LacrudaBulkAction;
use RealSoft\Lacruda\Components\LacrudaField;

trait LacrudaModel
{
    public function getFillable()
    {
        return Schema::getColumnListing($this->getTable());
    }

    public function getViewTitleAttribute($value)
    {
        return $value ? $value : trim(preg_replace('/[A-Z]([A-Z](?![a-z]))*/', ' $0', class_basename($this)));
    }

    public function fields()
    {
        return [
            LacrudaField::make('ID')
                ->tableColumn()->tableSearchable()->tableSortable()->tableOrder('desc'),

            LacrudaField::make('Name')
                ->tableColumn()->tableSearchable()->tableSortable()
                ->input()->inputCreate()->inputEdit()
                ->rules(['required', 'min:2']),

            LacrudaField::make('Created At')
                ->tableColumn()->tableSearchable()->tableSortable(),

            LacrudaField::make('Updated At'),
        ];
    }

    public function fieldRules($property)
    {
        $field_rules = [];

        foreach ($this->fields() as $field) {
            $field_rules[$field->name] = array_merge($field->rules_any, $field->{$property});
        }

        return $field_rules;
    }

    public function actions()
    {
        return [
            LacrudaAction::details(),
            LacrudaAction::edit(),
            LacrudaAction::delete(),
        ];
    }

    public function bulkActions()
    {
        return [
            LacrudaBulkAction::delete(),
        ];
    }
}
