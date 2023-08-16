<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermessionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions=[
            'roles',
            'users',
        ];

        $actions=['read','update','delete','create'];

        foreach ($permissions as $single){
            foreach ($actions as $one){
                Permission::create([
                    'name'          =>   $one.'-'.$single,
                    'guard_name'    =>   'web'
                ]);
            }
        }}
}
