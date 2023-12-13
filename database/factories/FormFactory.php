<?php

declare(strict_types=1);

namespace PatrickZuurbier\FormServer\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use PatrickZuurbier\FormServer\Models\Form;

/**
 * @extends Factory<Form>
 */
class FormFactory extends Factory
{
    protected $model = Form::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'         => $this->faker->name,
            'action'       => $this->faker->url,
            'redirect_url' => $this->faker->url,
        ];
    }
}
