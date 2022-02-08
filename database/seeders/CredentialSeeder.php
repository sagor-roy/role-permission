<?php

namespace Database\Seeders;

use App\Models\Creadential;
use Illuminate\Database\Seeder;

class CredentialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Creadential::create(
            [
                'name' => 'facebook',
                'client_id' => '249082247381442',
                'secret_id' => 'fb8ba6fdb9d85bfad5714dd61605f233',
                'redirect' => 'https://role.me/callback/facebook',
            ]
        );

        Creadential::create(
            [
                'name' => 'google',
                'client_id' => '1086006108055-7njnbbvhmnbplf4le4cg0iv13an5m9k6.apps.googleusercontent.com',
                'secret_id' => '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',
                'redirect' => 'http://role.me/callback/google',
            ]
        );

        Creadential::create(
            [
                'name' => 'github',
                'client_id' => 'dcc3e99e3f7cce76ac42',
                'secret_id' => '2a47ac4ba1018c79bc0aff63deb54ae0e25b86d2',
                'redirect' => 'http://role.me/callback/github',
            ]
        );
    }
}
