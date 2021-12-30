<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Amnaj Kowan';
        $user->position = 'หัวหน้างานตำแหน่ง OTOP';
        $user->phone = '081-123-4567';
        $user->email = 'admin@gmail.com';
        $user->password = bcrypt('123456');
        $user->role = 'ADMIN';
        $user->save();
    }
}
