<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Group;
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
        $group = Group::factory(1)->create();
        User::factory(30)->create();
        $users = User::limit(10)->get();

        foreach ($users as $user) {
            $user->group()->associate($group->first())->save();
        }
    }
}
