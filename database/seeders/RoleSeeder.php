<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class RoleSeeder extends Seeder
{



    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $roles = [
            [
                'id' => 1,
                'name' => 'admin',
                'active' => 1,
                'created_at' => Carbon::now()->format('Y-m-d h:i:s')
            ],
            [
                'id' => 2,
                'name' => 'guest',
                'active' => 1,
                'created_at' => Carbon::now()->format('Y-m-d h:i:s')
            ]
        ];

        foreach ($roles as $role) {
            $roleDB = DB::table('roles')->find($role['id']);
            if (!$roleDB) {
                DB::table('roles')->insert($role);
            }
        }
    }


}
