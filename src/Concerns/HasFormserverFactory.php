<?php

namespace PatrickZuurbier\FormServer\Concerns;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

trait HasFormServerFactory
{
    use HasFactory;

    protected static function newFactory(): object
    {
        $package   = Str::before(get_called_class(), 'Models\\');
        $modelName = Str::after(get_called_class(), 'Models\\');
        $path      = $package.'Database\\Factories\\'.$modelName.'Factory';

        return new $path();
    }
}
