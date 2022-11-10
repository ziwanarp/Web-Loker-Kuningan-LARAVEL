<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(5)->create();
        User::create([
            'name' => 'Ziwana Rizwan Pramudia',
            'email' => 'ziwanarizwan@gmail.com',
            'username'=>'ziwanarp',
            'password' => bcrypt('password')
        ]);
        // User::create([
        //     'name' => 'radea',
        //     'email' => 'radean@gmail.com',
        //     'password' => bcrypt('12345')
        // ]);

        Category::create([
            'name' => 'programming',
            'slug' => 'programming'
        ]);

        Category::create([
            'name' => 'website',
            'slug' => 'website'
        ]);

        Category::create([
            'name' => 'technology',
            'slug' => 'technology'
        ]);

        \App\Models\Post::factory(30)->create();
        // Post::create([
        //     'title' => 'judul pertama',
        //     'category_id' => 1,
        //     'user_id' => 1,
        //     'slug' => 'judul-pertama',
        //     'excerpt' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aperiam esse cupiditate, amet voluptas voluptatum maiores sed sequi eius vero sapiente. Blanditiis vero labore aperiam animi ratione.',
        //     'body' => '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aperiam esse cupiditate, amet voluptas voluptatum maiores sed sequi eius vero sapiente. Blanditiis vero labore aperiam animi ratione.</p><p> Nemo minus aliquid voluptatum? Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus quis nemo omnis quasi deserunt molestiae laborum ullam alias rem unde, odio adipisci quo recusandae culpa, dignissimos odit quam facere veniam.</p><p> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laborum modi pariatur, optio sed explicabo commodi dolorum nobis ipsum! Nemo omnis officia nisi necessitatibus eligendi aliquid sint corporis voluptates quis architecto. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fugit, aperiam nostrum. Dolor tenetur debitis dicta harum totam, aliquid dolores illum quaerat minus ipsum, sint deserunt magni facilis cumque officiis ex!</p>'
        // ]);

        // Post::create([
        //     'title' => 'judul kedua',
        //     'category_id' => 1,
        //     'user_id' => 2,
        //     'slug' => 'judul-kedua',
        //     'excerpt' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aperiam esse cupiditate, amet voluptas voluptatum maiores sed sequi eius vero sapiente. Blanditiis vero labore aperiam animi ratione.',
        //     'body' => '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aperiam esse cupiditate, amet voluptas voluptatum maiores sed sequi eius vero sapiente. Blanditiis vero labore aperiam animi ratione.</p><p> Nemo minus aliquid voluptatum? Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus quis nemo omnis quasi deserunt molestiae laborum ullam alias rem unde, odio adipisci quo recusandae culpa, dignissimos odit quam facere veniam.</p><p> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laborum modi pariatur, optio sed explicabo commodi dolorum nobis ipsum! Nemo omnis officia nisi necessitatibus eligendi aliquid sint corporis voluptates quis architecto. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fugit, aperiam nostrum. Dolor tenetur debitis dicta harum totam, aliquid dolores illum quaerat minus ipsum, sint deserunt magni facilis cumque officiis ex!</p>'
        // ]);

        // Post::create([
        //     'title' => 'judul ketiga',
        //     'category_id' => 2,
        //     'user_id' => 1,
        //     'slug' => 'judul-ketiga',
        //     'excerpt' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aperiam esse cupiditate, amet voluptas voluptatum maiores sed sequi eius vero sapiente. Blanditiis vero labore aperiam animi ratione.',
        //     'body' => '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aperiam esse cupiditate, amet voluptas voluptatum maiores sed sequi eius vero sapiente. Blanditiis vero labore aperiam animi ratione.</p><p> Nemo minus aliquid voluptatum? Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus quis nemo omnis quasi deserunt molestiae laborum ullam alias rem unde, odio adipisci quo recusandae culpa, dignissimos odit quam facere veniam.</p><p> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laborum modi pariatur, optio sed explicabo commodi dolorum nobis ipsum! Nemo omnis officia nisi necessitatibus eligendi aliquid sint corporis voluptates quis architecto. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fugit, aperiam nostrum. Dolor tenetur debitis dicta harum totam, aliquid dolores illum quaerat minus ipsum, sint deserunt magni facilis cumque officiis ex!</p>'
        // ]);
    }
}
