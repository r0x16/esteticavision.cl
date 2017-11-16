<?php

use Illuminate\Database\Seeder;

class AdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' => 'Administrador',
            'email' => 'esteticavision.cl@gmail.com',
            'password' => bcrypt('meveoyveobien'),
            'created_at' => new DateTime()
        ]);
    }
}
