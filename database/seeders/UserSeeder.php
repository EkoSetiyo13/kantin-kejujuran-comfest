<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'id' => 1,
                'name' => 'siswa1',
                'student_id' => '12306',
                'password' => 'siswa123',
                'balance' => 20000
            ],
            [
                'id' => 2,
                'name' => 'siswa2',
                'student_id' => '44412',
                'password' => 'siswa123',
                'balance' => 10000
            ]
        ];
        collect($user)->map(function ($data) {
            return User::create($data);
        });
    }
}
