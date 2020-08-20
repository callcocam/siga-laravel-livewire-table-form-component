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
        \Illuminate\Support\Facades\DB::table('users')->delete();
        \Illuminate\Support\Facades\DB::table('roles')->delete();

        $Tenant =  factory(\App\Tenant::class)->create([
            'name'=>"localhost", 'status'=>"published"
        ])->first();

        $role =  factory(\App\Role::class)->create([
            'tenant_id'=>$Tenant->id, 'name'=>"Super Admin", 'slug'=>"super-admin", 'description'=>"Controle Geral Do Sistema", 'special'=>"all-access"
        ])->first();


        $user =  factory(\App\User::class)->create([
            'tenant_id'=>$Tenant->id,'type'=>"cpf",'name'=>"Super Admin",'fantasy'=>"Super Admin",'email'=>"super-admin@example.com",'document'=>"11111111111",'phone'=>"888888888"
        ])->first();

        $user->roles()->sync($role->id);
    }
}
