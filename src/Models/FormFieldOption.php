<?php

declare(strict_types=1);

namespace PatrickZuurbier\FormServer\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use PatrickZuurbier\FormServer\Concerns\HasFormServerFactory;
use Spatie\Translatable\HasTranslations;

class FormFieldOption extends Model
{
    use HasFormServerFactory;
    use HasTranslations;

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'label',
        'value',
        'is_default',
        'position',
    ];

    /**
     * @var array<int, string>
     */
    public $translatable = [
        'label',
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'is_default' => 'boolean',
        'position'   => 'integer',
        'label'      => 'array',
    ];

    /**
     * @return BelongsTo<FormField, self>
     */
    public function formField(): BelongsTo
    {
        return $this->belongsTo(FormField::class);
    }
}
