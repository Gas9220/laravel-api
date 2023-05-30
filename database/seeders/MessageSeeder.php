<?php

namespace Database\Seeders;

use App\Models\Message;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 30; $i++) {

            $new_message = new Message();
            $new_message->user = fake()->name;
            $new_message->email = fake()->email();
            $new_message->message = fake()->text();
            $new_message->save();

        }
    }
}
