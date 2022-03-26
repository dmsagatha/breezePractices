<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  public function run()
  {
    Post::query()->delete();
    Category::query()->delete();
    User::query()->delete();

    User::create([
      'name'     => 'Super Admin',
      'email'    => 'superadmin@admin.net',
      'password' => Hash::make('superadmin')
    ]);

    Category::factory()->times(5)->create();

    Post::factory(50)->create();
  }
}