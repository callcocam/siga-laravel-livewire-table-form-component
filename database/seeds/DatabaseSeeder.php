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
        $Tenant = null;
        if(config('lw-call.tenant', false)){
            \Illuminate\Support\Facades\DB::table('tenants')->delete();
            $Tenant =  factory(\App\Tenant::class)->create([
                'name'=>"localhost", 'status'=>"published"
            ])->first()->id;
        }
        \Illuminate\Support\Facades\DB::table('users')->delete();
        \Illuminate\Support\Facades\DB::table('roles')->delete();
        $role =  factory(\App\Role::class)->create([
            'tenant_id'=>$Tenant, 'name'=>"Super Admin", 'slug'=>"super-admin", 'description'=>"Controle Geral Do Sistema", 'special'=>"all-access"
        ])->first();
        $user =  factory(\App\User::class)->create([
            'tenant_id'=>$Tenant,'type'=>"cpf",'name'=>"Super Admin",'fantasy'=>"Super Admin",'email'=>"super-admin@example.com",'document'=>"11111111111",'phone'=>"888888888"
        ])->first();
        $user->roles()->sync($role->id);
    }
}
