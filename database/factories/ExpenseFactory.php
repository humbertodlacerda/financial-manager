<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Expense>
 */
class ExpenseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user = User::all()->pluck('id');
        $category = Category::all()->pluck('id');
        $date = fake()->dateTimeBetween('now')->format('Y-m-d');

        return [
            'user_id' => fake()->randomElement($user),
            'category_id' => fake()->randomElement($category),
            'date' => $date,
            'notification_date' => Carbon::parse($date)->subDay(1)->format('Y-m-d'),
            'description' => fake()->sentence,
            'value' => fake()->randomFloat(2, 1, 1000)
        ];
    }
}
