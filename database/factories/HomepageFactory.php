<?php
namespace Database\Factories;

use App\Models\Homepage;
use Illuminate\Database\Eloquent\Factories\Factory;

class HomepageFactory extends Factory
{
    protected $model = Homepage::class;

    public function definition()
    {
        return [
        'title' => $this->faker->title,
        'published' => $this->faker->boolean,
    ];
    }
}
