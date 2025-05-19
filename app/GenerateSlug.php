<?php

namespace App;

use Illuminate\Support\Str;

trait GenerateSlug
{
    public static function generateSlug($model, $base)
    {
        $model = new $model;
        $slug = Str::kebab($base);
        if ($model->where('slug', $slug)->exists()) {
            $slug .= '-' . Str::random(4);
        }
        return $slug;
    }
}
