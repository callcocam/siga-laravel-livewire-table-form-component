<?php

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $tenant =  \Illuminate\Support\Facades\DB::table('tenants')->where('name','localhost')->first();
      \Illuminate\Support\Facades\DB::table('permissions')->delete();
       $routes  = \Call\Suports\Helpers\LoadRouterHelper::make();
        if($routes):
            foreach ($routes as $route):
                if(!\App\Permission::query()->where('slug', $route)->count()):
                    $explode = explode(".", $route);
                    $last = last($explode);
                    $name = str_replace("."," ", \Illuminate\Support\Str::title($route));
                    \App\Permission::query()->create(
                        factory(\App\Permission::class)->make([
                            'tenant_id'=>$tenant->id,
                            'name'=> $name,
                            'slug'=>$route,
                            'grupo'=>$last,
                            'description'=> $name
                        ])->toArray()
                    );
                endif;
            endforeach;
        endif;
    }
}
