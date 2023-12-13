<?php

declare(strict_types=1);

namespace PatrickZuurbier\FormServer\Models;

use Illuminate\Database\Eloquent\Model;
use PatrickZuurbier\FormServer\Concerns\HasFormServerFactory;

class Form extends Model
{
    use HasFormServerFactory;

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'action',
        'redirect_url',
    ];
}
