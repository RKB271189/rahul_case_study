<?php
namespace Database\Seeders;
use App\ORM_Model\Fld_Product\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::factory()->count(100)->create()->each(function ($user) {
            $user->save();
        });
    }
}
