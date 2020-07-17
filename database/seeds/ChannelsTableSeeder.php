<?php

use DiscussionForum\Channel;
use Illuminate\Database\Seeder;

class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Channel::create([
            'title'=>'Laravel_7.0',
            'slug'=>str_slug('Laravel_7.0')

        ]);

        Channel::create([
            'title'=>'Vue js',
            'slug'=>str_slug('Vue js')
        ]);

        Channel::create([
            'title'=>'Node js',
            'slug'=>str_slug('Node js')
        ]);

        Channel::create([
            'title'=>'Angularjs',
            'slug'=>str_slug('Angularjs')
        ]);
        Channel::create([
            'title'=>'jquery1.1.1',
            'slug'=>str_slug('jquery1.1.1')

        ]);

        Channel::create([
            'title'=>'HTML5',
            'slug'=>str_slug('HTML5')
        ]);

        Channel::create([
            'title'=>'CSS',
            'slug'=>str_slug('CSS')
        ]);

        Channel::create([
            'title'=>'Javascript',
            'slug'=>str_slug('Javascript')
        ]);
    }
}
