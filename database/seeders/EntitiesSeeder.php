<?php

namespace Database\Seeders;

use App\Models\Entity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class EntitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $entities = Http::get(env('PUBLIC_APIS_URL'))->json();

        $flag = "Animals";
        $animalsApis = array_filter($entities['entries'], function ($var) use ($flag) {
            return ($var['Category'] === $flag);
        });

        $flag = "Security";
        $securityApis = array_filter($entities['entries'], function ($var) use ($flag) {
            return ($var['Category'] === $flag);
        });


        foreach ($animalsApis as $api) {
            Entity::create([
                'api' => $api['API'],
                'description' => $api['Description'],
                'link' => $api['Link'],
                'category_id' => 1
            ]);
        }
        ;

        foreach ($securityApis as $api) {
            Entity::create([
                'api' => $api['API'],
                'description' => $api['Description'],
                'link' => $api['Link'],
                'category_id' => 2
            ]);
        }
        ;
    }
}
