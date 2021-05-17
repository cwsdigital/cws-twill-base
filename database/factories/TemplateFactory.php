<?php

namespace Database\Factories;

use App\Models\Template;
use Illuminate\Database\Eloquent\Factories\Factory;

class TemplateFactory extends Factory
{
    protected $model = Template::class;

    public function definition()
    {
        return [
            'uid' => $this->faker->word,
            'title' => $this->faker->word,
            'admin_only' => 0,
            'show_content_editor' => 1
        ];
    }
}
