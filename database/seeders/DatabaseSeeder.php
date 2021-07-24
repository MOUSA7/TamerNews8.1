<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $roles = ['admin'];
        foreach ($roles as $key=>$value){
            Role::create(['name'=>$value,'permissions'=>json_encode(['users','roles'])]);
        }


        User::create([
            'name'=>'mousa',
            'email'=>'mousa@hotmail.com',
            'password'=>bcrypt('password'),
            'role_id'=>1
        ]);

        $categories = ['International','Sports','Local','Political'];
        foreach ($categories as $key=>$value){
            Category::create(['name'=>$value]);
        }

        Post::factory(20)->create();

    }
}
