<?php
namespace Database\Factories;

use App\Models\Page;
use Illuminate\Database\Eloquent\Factories\Factory;

class PageFactory extends Factory
{
    protected $model = Page::class;

    public function definition()
    {
        return [
        'title' => $this->faker->title,
        'published' => $this->faker->boolean,
    ];
    }
}
