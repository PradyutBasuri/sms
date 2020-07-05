<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
           'user-edit'
         ];
    $guards=[
        'admin',
        'teacher',
        'web'
    ];
         foreach ($permissions as $permission) {
              
              foreach($guards as $guards){
                Permission::create(['name' => $permission,'guard_name'=>$guards]);
              }
         }
    }
}
