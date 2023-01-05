<?php

namespace Database\Seeders;

use Dirape\Token\Token;
use Exception;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run()
    {
        $users = [
            [
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'password' => 'password',
                'uuid' => Uuid::uuid4(),
                'role_id' => 1,
                'lang' => 'es',
                'api_key' => (new Token())->Unique('users', 'api_key', 60)
            ],
            [
                'name' => 'user 1',
                'email' => 'admin-1@admin.com',
                'password' => 'password',
                'uuid' => Uuid::uuid4(),
                'role_id' => 2,
                'lang' => 'es',
                'api_key' => (new Token())->Unique('users', 'api_key', 60)
            ],
            [
                'name' => 'user 2',
                'email' => 'admin-2@admin.com',
                'password' => 'password',
                'uuid' => Uuid::uuid4(),
                'role_id' => 2,
                'lang' => 'es',
                'api_key' => (new Token())->Unique('users', 'api_key', 60)
            ]
        ];

        foreach ($users as $user) {
            $userDb = DB::table('users')->where('email', $user['email'])->first();

            if (!$userDb) {
                DB::table('users')->insert($user);
            }
        }
    }
}
