<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {    
         //Kitchen
      for ($i=1; $i < 10; $i++){ 
          Product::create([
         'name'=>'Kitchen'.$i,
         'slug'=>'Kitchen'.$i.'.'.'jpg',
         'details'=>[13,11,9][array_rand([13,11,9])].'inch,'.[2,4,6][array_rand([2,4,6])].'th with,'.[13,11,9][array_rand([13,11,9])].'kg weight',
         'price'=>rand(1323,1414),
         'description'=>'Lorem'.$i.' ipsum dolor sit amet, consectetur adipisicing elit. Aliquid quae eveniet culpa officia quidem mollitia impedit iste asperiores nisi reprehenderit consequatur, autem, nostrum pariatur enim?',
         ])->categories()->attach(1);


      }

      // $product = Product::find(1);
      // $product->categories()->attach(2);

         //Food
      for ($i=1; $i < 10; $i++){ 
          Product::create([
         'name'=>'Food'.$i,
         'slug'=>'Food'.$i.'.'.'jpg',
         'details'=>[13,11,9][array_rand([13,11,9])].'inch,'.[2,4,6][array_rand([2,4,6])].'th with,'.[13,11,9][array_rand([13,11,9])].'kg weight',
         'price'=>rand(1323,1414),
         'description'=>'Lorem'.$i.' ipsum dolor sit amet, consectetur adipisicing elit. Aliquid quae eveniet culpa officia quidem mollitia impedit iste asperiores nisi reprehenderit consequatur, autem, nostrum pariatur enim?',
         ])->categories()->attach(2);


      }

           //Costamic
      for ($i=1; $i < 10; $i++){ 
          Product::create([
         'name'=>'Costamic'.$i,
         'slug'=>'Costamic'.$i.'.'.'jpg',
         'details'=>[13,11,9][array_rand([13,11,9])].'inch,'.[2,4,6][array_rand([2,4,6])].'th with,'.[13,11,9][array_rand([13,11,9])].'kg weight',
         'price'=>rand(1323,1414),
         'description'=>'Lorem'.$i.' ipsum dolor sit amet, consectetur adipisicing elit. Aliquid quae eveniet culpa officia quidem mollitia impedit iste asperiores nisi reprehenderit consequatur, autem, nostrum pariatur enim?',
         ])->categories()->attach(3);


      }
      
      //Vegetable
      for ($i=1; $i < 10; $i++){ 
          Product::create([
         'name'=>'Vegetable'.$i,
         'slug'=>'Vegetable'.$i.'.'.'jpg',
         'details'=>[13,11,9][array_rand([13,11,9])].'inch,'.[2,4,6][array_rand([2,4,6])].'th with,'.[13,11,9][array_rand([13,11,9])].'kg weight',
         'price'=>rand(1323,1414),
         'description'=>'Lorem'.$i.' ipsum dolor sit amet, consectetur adipisicing elit. Aliquid quae eveniet culpa officia quidem mollitia impedit iste asperiores nisi reprehenderit consequatur, autem, nostrum pariatur enim?',
         ])->categories()->attach(4);


      }

   

    }
}
