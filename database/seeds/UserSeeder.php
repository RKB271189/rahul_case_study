<?php
namespace Database\Seeders;
use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Generate Fake Data
        User::factory()->count(1)->create()->each(function ($user) {
            $user->save();
        });
    }
}
