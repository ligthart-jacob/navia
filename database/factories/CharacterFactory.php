<?php

namespace Database\Factories;

use App\Models\Series;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Character>
 */
class CharacterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $randomColor = str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
        $source = imagecreatefrompng("https://placehold.co/225x350/$randomColor/000000/png");
        $filename = fake()->regexify('[A-Za-z0-9]{20}') . '.png';
        imagepng($source, "d:/dev/xampp/htdocs/navia/public/cards/$filename");

        return [
            'name' => fake()->name(),
            'image' => "/cards/$filename",
            'obtained' => rand(0, 1) ? true : false,
            'series_id' => Series::all()->random()->id
        ];
    }
}
