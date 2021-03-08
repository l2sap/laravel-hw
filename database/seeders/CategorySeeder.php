<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Stringable;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('categories')->insert($this->getData());
    }

    public function getData(): array
    {
        $faker = Factory::create('en_RU');
        $data = [];

        for ($i = 0; $i < 10; $i++) {

            $title = $faker->sentence(mt_rand(3, 10));
            $data[] = [
                'title' => $title,
                'slug' => ' ',
                'description' => $faker->text(mt_rand(100, 200)),
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        return $data;
    }
}
