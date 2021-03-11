<?php

namespace Database\Factories\Travel;

use App\Models\Travel\TravelPacage;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TravelPackageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TravelPacage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'title' => $this->faker->name,
            'slug'  => $this->faker->slug,
            'location' => $this->faker->state,
            'about' => $this->faker->address,
            'featured_events'  => $this->faker-> userName,
            'leagueges' => $this->faker->languageCode,
            'food'  => $this->faker->company,
            'departure_date'  => $this->faker->date(),
            'duration' => $this->faker->currencyCode  ,
            'type'  => $this->faker->creditCardType,
            'price'  => $this->faker->randomNumber(2),
        ];
    }
}
