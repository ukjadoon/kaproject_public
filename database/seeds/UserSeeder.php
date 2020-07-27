<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = explode(',', config('app.admin_names'));
        $emails = explode(',', config('app.admin_emails'));
        $passwords = explode(',', config('app.admin_passwords'));
        if (count($emails) != count($passwords) || count($names) != count($emails)) {

            throw new Exception('The number of emails does not match the number of passwords');
        }
        foreach($emails as $key => $email) {
            $user = factory(User::class)->make([
                'name' => $names[$key],
                'email' => $email,
                'password' => Hash::make($passwords[$key]),
            ]);
            $user->save();
        }
    }
}
