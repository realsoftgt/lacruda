<?php

namespace RealSoft\Lacruda\Components;

class LacrudaAction
{
    private $view;

    public function __get($property)
    {
        return $this->$property;
    }

    public function __construct($view = '')
    {
        $this->view = $view;
    }

    public static function details()
    {
        return self::make('lacruda::models.actions.details');
    }

    public static function edit()
    {
        return self::make('lacruda::models.actions.edit');
    }

    public static function delete()
    {
        return self::make('lacruda::models.actions.delete');
    }

    public static function make($view = '')
    {
        return new LacrudaAction($view);
    }
}
