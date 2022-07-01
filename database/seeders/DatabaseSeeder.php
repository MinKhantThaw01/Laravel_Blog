<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $koutkout = User::factory()->create(["name"=>"koutkout", "user_name"=>"kout_kout"]);
        $tophie = User::factory()->create(["name"=>"tophie", "user_name"=>"to_phie"]);

        $fronted = Category::factory()->create(["name"=> "fronted","slug"=>"fronted"]);
        $backend = Category::factory()->create(["name"=> "backend","slug"=>"backend"]);

        Blog::factory(2)->create(["category_id"=> $fronted->id,"user_id"=>$koutkout->id]);
        Blog::factory(2)->create(["category_id"=> $backend->id,"user_id"=>$tophie->id]);




        

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
