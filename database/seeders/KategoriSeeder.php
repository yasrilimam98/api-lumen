<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i = 0; $i < 100; $i++) {
            $faker = Faker::create();
            $data = [
                'kategori' => $faker->name,
                'keterangan' => $faker->text
            ];
            Kategori::create($data);
        }
    }
}