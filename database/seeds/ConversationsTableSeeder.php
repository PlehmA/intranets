<?php

use Illuminate\Database\Seeder;
use App\Conversation;

class ConversationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Conversation::create([
            'user_id'               => 2,
            'contact_id'            => 3,
            'last_message'          => null,
            'last_time'             => null,
            //'listen_notifications'  => ,
            //'has_blocked'           => ,
        ]);
        Conversation::create([
            'user_id'               => 3,
            'contact_id'            => 2,
            'last_message'          => null,
            'last_time'             => null,
            //'listen_notifications'  => ,
            //'has_blocked'           => ,
        ]);
        Conversation::create([
            'user_id'               => 2,
            'contact_id'            => 4,
            'last_message'          => null,
            'last_time'             => null,
            //'listen_notifications'  => ,
            //'has_blocked'           => ,
        ]);
        Conversation::create([
            'user_id'               => 4,
            'contact_id'            => 2,
            'last_message'          => null,
            'last_time'             => null,
            //'listen_notifications'  => ,
            //'has_blocked'           => ,
        ]);
    }
}
