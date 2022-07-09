<?php

namespace Database\Factories;

use App\ORM_Model\Fld_Product\Product;
// use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory
{
    protected $model = Product::class;
    public function definition()
    {
        return [
            'name' => $faker->name,
            'quantity' => $faker->numberBetween(15, 100),
            'price' => number_format($faker->numberBetween(1500, 10000), 2, '.', '')
        ];
    }
    // $factory->define(Product::class, function (Faker $faker) {
    //     return [
    //         'name' => $faker->name,
    //         'quantity' => $faker->numberBetween(15, 100),
    //         'price' => number_format($faker->numberBetween(1500, 10000), 2, '.', '')
    //     ];
    // });
}
