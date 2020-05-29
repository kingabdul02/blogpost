<?php

use Illuminate\Database\Seeder;
use App\Administrator;

class AdministratorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $admin = new Administrator();
      $admin->name = "admin";
      $admin->password = bcrypt("08138969876");
      $admin->save();
    }
}
