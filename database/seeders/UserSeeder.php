<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use App\Models\AgentDetail;
use Illuminate\Database\Seeder;
use App\Models\UserSubscription;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $user = User::create([
            'name' => 'user',
            'email' => 'user@example.com',
            'is_email_verified' => '1',
            'password' => bcrypt('password'),
        ]);

    }
}
