<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('tenants')->delete();
        \Illuminate\Support\Facades\DB::table('companies')->delete();
        \Illuminate\Support\Facades\DB::table('users')->delete();
        \Illuminate\Support\Facades\DB::table('roles')->delete();

        $Tenant =  factory(\App\Tenant::class)->create([
            'name'=>"localhost", 'status'=>"published"
        ])->first();


        $roleSuper =  factory(\App\Role::class)->create([
            'tenant_id'=>$Tenant->id, 'name'=>"Super Admin", 'slug'=>"super-admin", 'description'=>"Controle Geral Do Sistema", 'special'=>"all-access"
        ])->first();

        $roleAdmin =  factory(\App\Role::class)->create([
            'tenant_id'=>$Tenant->id, 'name'=>"Administrador", 'slug'=>"administrador", 'description'=>"Controle Parcial Do Sistema", 'special'=>null
        ])->first();

        $userSuper =  factory(\App\User::class)->create([
            'tenant_id'=>$Tenant->id,'type'=>"cpf",'name'=>"Super Admin",'fantasy'=>"Super Admin",'email'=>"super-admin@example.com",'document'=>"11111111111",'phone'=>"888888888"
        ])->first();

        $userAdmin =  factory(\App\User::class)->create([
            'tenant_id'=>$Tenant->id,'type'=>"cpf",'name'=>"Administrador",'fantasy'=>"Administrador",'email'=>"admin@example.com",'document'=>"22222222222",'phone'=>"999999999"
        ])->first();


        $userSuper->roles()->sync($roleSuper->id);
        $userAdmin->roles()->sync($roleAdmin->id);

        $Company =  factory(\App\Company::class)->create([
            'tenant_id'=>$Tenant->id,
            'user_id'=>$userSuper->id,
        ])->first();


        $userSuper->companies()->sync($Company->id);
        $userAdmin->companies()->sync($Company->id);
        $this->call(PermissionSeeder::class);

    }
}
