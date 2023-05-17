<?php
  
namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
  
class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
               'name'=>'Admin User',
               'email'=>'admin@gmail.com',
               'phone'=>'012345679',
               'type'=>1,
               'password'=> bcrypt('1111'),
            ],
            [
               'name'=>'Merchant User',
               'email'=>'merchant@gmail.com',
               'phone'=>'012345679',
               'type'=> 2,
               'password'=> bcrypt('2222'),
            ],
        ];

        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}