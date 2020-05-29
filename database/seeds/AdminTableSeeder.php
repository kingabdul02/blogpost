<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {      
        $admin = new \App\Admin();
        $admin->email = 'kingabdul0202@gmail.com';
        $admin->password = bcrypt("08138969876");
        $admin->save();
    }
}
