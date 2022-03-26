<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  public function run()
  {
    User::query()->delete();

    User::create([
      'name'     => 'Super Admin',
      'email'    => 'superadmin@admin.net',
      'password' => Hash::make('superadmin')
    ]);
    
    // \App\Models\User::factory(50)->create();
  }
}