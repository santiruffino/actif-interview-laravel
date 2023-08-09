<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $count = \DB::table('categories')->count();
        if ($count == 0) {
            Category::create([
                'category' => 'Animals'
            ]);

            Category::create([
                'category' => 'Security'
            ]);
        }
        ;
    }
}
