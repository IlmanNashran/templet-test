<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;


class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
			'id' => '1',
            'name' => 'Air shower',
        ]);

		Category::create([
			'id' => '2',
            'name' => 'Aircond',
        ]);

		Category::create([
			'id' => '3',
            'name' => 'Autoclave',
        ]);

		Category::create([
			'id' => '4',
            'name' => 'Bangunan',
        ]);

		Category::create([
			'id' => '5',
            'name' => 'Boiler',
        ]);

		Category::create([
			'id' => '6',
            'name' => 'Dryer',
        ]);

		Category::create([
			'id' => '7',
            'name' => 'Extension',
        ]);

		Category::create([
			'id' => '8',
            'name' => 'Holder lampu',
        ]);

		Category::create([
			'id' => '9',
            'name' => 'Holder starter',
        ]);

		Category::create([
			'id' => '10',
            'name' => 'Hood',
        ]);

		Category::create([
			'id' => '11',
            'name' => 'Kerusi hood',
        ]);

		Category::create([
			'id' => '12',
            'name' => 'Kipas',
        ]);

		Category::create([
			'id' => '13',
            'name' => 'Lampu hood',
        ]);

		Category::create([
			'id' => '14',
            'name' => 'Lampu shelf',
        ]);

		Category::create([
			'id' => '15',
            'name' => 'Lampu siling',
        ]);

		Category::create([
			'id' => '16',
            'name' => 'Oven',
        ]);

		Category::create([
			'id' => '17',
            'name' => 'Peralatan elektrik',
        ]);

		Category::create([
			'id' => '18',
            'name' => 'Peralatan makmal',
        ]);

		Category::create([
			'id' => '19',
            'name' => 'Pintu',
        ]);

		Category::create([
			'id' => '20',
            'name' => 'Plug point',
        ]);

		Category::create([
			'id' => '21',
            'name' => 'Power truck',
        ]);

		Category::create([
			'id' => '22',
            'name' => 'Prioclave',
        ]);

		Category::create([
			'id' => '23',
            'name' => 'Shaker',
        ]);

		Category::create([
			'id' => '24',
            'name' => 'Sinki',
        ]);

		Category::create([
			'id' => '25',
            'name' => 'Telefon',
        ]);

		Category::create([
			'id' => '26',
            'name' => 'Tiles',
        ]);

		Category::create([
			'id' => '27',
            'name' => 'Troli',
        ]);

		Category::create([
			'id' => '28',
            'name' => 'Utiliti',
        ]);

		Category::create([
			'id' => '29',
            'name' => 'Vakum',
        ]);

		Category::create([
			'id' => '30',
            'name' => 'Lain-lain',
        ]);
    }
}
