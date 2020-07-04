<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name=[
            'admin',
            'teacher',
            'cleark'
         ];
         $guard=[
            'admin',
            'teacher',
            'web'
         ];
         foreach ($name as $key=> $name) {
            Role::create(['name' => $name,'guard_name'=>$guard[$key]]);
       }
        
    }
}
