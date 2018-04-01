# DOMICILIOS

CRUD PARA USUARIOS

## Archivo SEED o DML
    $role_user  = Role::where("name", "customer")->first();
        $role_admin = Role::where('name', 'admin')->first();        
        $role_agent = Role::where('name', 'agent')->first();        
        
   
        $user = new User();
        $user ->name = "User";
        $user ->email = "user@user.com";
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
        $user->name = 'Agent';
        $user->email = 'agent@agent.com';
        $user->password = bcrypt('12345678');
        $user ->phone = "555-5555";
        $user ->user_active = true;                
        $user->save();
        $user->roles()->attach($role_agent);
        
### CORE FILES

The core files I think it's the HomeController, because it involves all the CRUD operations for the admin user, and also the home template involves a lot of work related with the views just to determinated users, depending on the roles.

The only external library I used was to connect with the API of Facebbok (Socialite) but wasn't able to complete that function.



```
