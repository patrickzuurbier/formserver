<?php

declare(strict_types=1);

namespace PatrickZuurbier\FormServer\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use PatrickZuurbier\FormServer\Concerns\HasFormServerFactory;
use PatrickZuurbier\FormServer\Enums\FormFieldTypeEnum;
use Spatie\Translatable\HasTranslations;

class FormField extends Model
{
    use HasFormServerFactory;
    use HasTranslations;

    /**
     * @var array<int, string>
     */
    public $translatable = [
        'label',
        'placeholder',
        'help',
    ];

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'step',
        'input_id',
        'name',
        'type',
        'label',
        'placeholder',
        'help',
        'rules',
        'position',
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'step'        => 'integer',
        'type'        => FormFieldTypeEnum::class,
        'position'    => 'integer',
        'label'       => 'array',
        'placeholder' => 'array',
        'help'        => 'array',
    ];

    /**
     * @return BelongsTo<Form, self>
     */
    public function form(): BelongsTo
    {
        return $this->belongsTo(Form::class);
    }

    /**
     * @return HasMany<FormFieldOption>
     */
    public function options(): HasMany
    {
        return $this->hasMany(FormFieldOption::class);
    }
}
