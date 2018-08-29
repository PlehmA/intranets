<?php

use Illuminate\Database\Seeder;
use App\Message;

class MessageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Message::create([
            'from_id'   =>  2,
            'to_id'     =>  3,
            'content'   =>  'hola Ivan Como estas?',
        ]);

        Message::create([
            'from_id'   =>  3,
            'to_id'     =>  2,
            'content'   =>  'Bien y tu?',
        ]);
        Message::create([
            'from_id'   =>  2,
            'to_id'     =>  4,
            'content'   =>  'hola Usuario4 Como estas?',
        ]);

        Message::create([
            'from_id'   =>  4,
            'to_id'     =>  2,
            'content'   =>  'Bien y tu?',
        ]);
    }
}
