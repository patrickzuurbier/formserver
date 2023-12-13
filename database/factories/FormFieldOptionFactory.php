<?php

declare(strict_types=1);

namespace PatrickZuurbier\FormServer\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use PatrickZuurbier\FormServer\Models\FormFieldOption;

/**
 * @extends Factory<FormFieldOption>
 */
class FormFieldOptionFactory extends Factory
{
    protected $model = FormFieldOption::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'label' => [
                'en' => $this->faker->word,
                'nl' => $this->faker->word,
            ],
            'value'      => $this->faker->word,
            'is_default' => $this->faker->boolean,
            'position'   => $this->faker->numberBetween(1, 10),
        ];
    }
}
