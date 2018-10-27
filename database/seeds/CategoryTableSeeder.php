<?php
use App\Category;
use Carbon\Carbon;

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();

        Category::insert([
          ['name' =>'Kitchen', 'slug' => 'Kitchen' ,'created_at' => $now , 'updated_at' => $now],
          ['name' =>'Food', 'slug' => 'Food' ,'created_at' => $now , 'updated_at' => $now],
          ['name' =>'Costamic', 'slug' => 'Costamic' ,'created_at' => $now , 'updated_at' => $now],
          ['name' =>'Vegetable', 'slug' => 'Vegetable' ,'created_at' => $now , 'updated_at' => $now],
        ]);
    }
}
