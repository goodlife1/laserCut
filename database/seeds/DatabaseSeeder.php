<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

//        factory(App\Product::class, 50)->create();
        factory(App\Category::class, 6)->create();
        factory(App\Product::class, 50)->create([])->each(function ($user) {
        for($i=0;$i<4;$i++){
           factory(App\Image::class)->create([
               'product_id'=>$user->id
           ])->make();
        }
        });
        $products = \App\Product::all();
        foreach ($products as $product){
        DB::table('product_category')->insert([
            'product_id' => $product->id,
            'category_id' => rand(1,6)
        ]);
        }
    }
}
