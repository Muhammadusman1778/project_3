<?php


use DiscussionForum\Reply;
use Illuminate\Database\Seeder;

class ReplyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Reply::create([
            'user_id'=>1,
            'discussion_id'=>1,
            'content'=>'If you want to see how your dataset or reports will look before sending out your survey, but you don’t want to complete the survey yourself over and over, you can generate random dummy data through the Generate Test Responses feature. You can find this feature in the Tools menu of the Survey tab.'
        ]);
        Reply::create([
            'user_id'=>2,
            'discussion_id'=>2,
            'content'=>'If you want to see how your dataset or reports will look before sending out your survey, but you don’t want to complete the survey yourself over and over, you can generate random dummy data through the Generate Test Responses feature. You can find this feature in the Tools menu of the Survey tab.'
        ]);

        Reply::create([
            'user_id'=>3,
            'discussion_id'=>3,
            'content'=>'If you want to see how your dataset or reports will look before sending out your survey, but you don’t want to complete the survey yourself over and over, you can generate random dummy data through the Generate Test Responses feature. You can find this feature in the Tools menu of the Survey tab.'
        ]);
        Reply::create([
            'user_id'=>4,
            'discussion_id'=>4,
            'content'=>'If you want to see how your dataset or reports will look before sending out your survey, but you don’t want to complete the survey yourself over and over, you can generate random dummy data through the Generate Test Responses feature. You can find this feature in the Tools menu of the Survey tab.'
        ]);
    }
}
