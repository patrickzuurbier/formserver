<?php

declare(strict_types=1);

namespace PatrickZuurbier\FormServer\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use PatrickZuurbier\FormServer\Enums\FormFieldTypeEnum;
use PatrickZuurbier\FormServer\Models\Form;
use PatrickZuurbier\FormServer\Models\FormField;

/**
 * @extends Factory<FormField>
 */
class FormFieldFactory extends Factory
{
    protected $model = FormField::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'form_id'  => Form::factory(),
            'step'     => $this->faker->numberBetween(1, 3),
            'input_id' => $this->faker->word,
            'name'     => $this->faker->word,
            'type'     => FormFieldTypeEnum::getRandomValue(),
            'label'    => [
                'en' => $this->faker->word,
                'nl' => $this->faker->word,
            ],
            'placeholder' => [
                'en' => $this->faker->word,
                'nl' => $this->faker->word,
            ],
            'help' => [
                'en' => $this->faker->sentence,
                'nl' => $this->faker->sentence,
            ],
            'rules'    => $this->faker->word,
            'position' => $this->faker->numberBetween(1, 10),
        ];
    }
}
