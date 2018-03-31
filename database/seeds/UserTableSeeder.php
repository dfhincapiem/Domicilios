<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $role_user  = Role::where("name", "Customer")->first();
        $role_admin = Role::where('name', 'admin')->first();        
   
        $user = new User();
        $user ->name = "Test";
        $user ->email = "test@test.com";
        $user ->password = bcrypt("12345678");
        $user ->phone = "555-5555";
        $user ->user_active = true;        
        $user ->save();
        $user->roles()->attach($role_user);

        $user = new User();
        $user->name = 'Admin';
        $user->email = 'admin@admin.com';
        $user->password = bcrypt('12345678');
        $user ->phone = "555-5555";
        $user ->user_active = true;                
        $user->save();
        $user->roles()->attach($role_admin);

        $user = new User();
        $user->name = 'Admin';
        $user->email = 'admin2@admin2.com';
        $user->password = bcrypt('12345678');
        $user ->phone = "555-5555";
        $user ->user_active = true;                
        $user->save();
        $user->roles()->attach($role_admin);

    }
}
