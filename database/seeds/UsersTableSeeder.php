<?php

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory(User::class)->create([
            'username' => "test",
            'password' => bcrypt('test'),
            'remember_token' => Str::random(10),
            'created_at' =>	now()->format('Y-m-d H:i:s'),
        ]);

    	// Every password set to "password"
        factory(User::class, 100)->create();
    }
}