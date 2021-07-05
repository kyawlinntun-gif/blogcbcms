<?php

use App\Profile;
use App\User;
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
        $user = User::create([
            'name' => 'Tun Tun',
            'email' => 'tuntun@gmail.com',
            'password' => Hash::make('12345678'),
            'admin' => 1
        ]);

        Profile::create([
            'avatar' => 'uploads/profile/1.png',
            'user_id' => $user->id,
            'about' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum nihil fuga nesciunt, repellendus voluptate cupiditate, tenetur inventore saepe nobis iste necessitatibus porro explicabo qui, sapiente sint reiciendis? Maxime, commodi illum.",
            'facebook' => 'facebook.com',
            'youtube' => 'youtube.com'
        ]);
    }
}
