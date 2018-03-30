<?php

use Illuminate\Database\Seeder;

use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = new App\Role();
        $role_user->name = "customer";
        $role_user->description = "Customer User";
        $role_user->save();
        $role_user->name = "agent";
        $role_user->description = "Agent User";
        $role_user->save();  
        $role_user->name = "admin";
        $role_user->description = "Admin User";
        $role_user->save();
        
        
    }
}
