<?php


use DiscussionForum\Discussion;
use Illuminate\Database\Seeder;

class DiscussionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Discussion::create([
            'user_id'=>1,
            'channel_id'=>2,
            'title'=>'Implementing OAuth with laravel passport',
            'content'=>'•	Write your name and registration number allocated to you by the university while submitting the application form and other information on the answer sheet and also on the question paper instructions’ page.
•	Number of sections, number of questions in each section and number of possible answers for each question can vary.
•	Each correct answer will carry 2 marks and 1/2 mark will be deducted for each incorrect answer.
•	Only use blue or black ink.
•	You are not allowed to use Calculators or lead pencils.
',
            'slug'=>str_slug('Implementing OAuth with laravel passport')
        ]);

        Discussion::create([
            'user_id'=>2,
            'channel_id'=>2,
            'title'=>'Pagination in vue js not working correctly',
            'content'=>'•	Write your name and registration number allocated to you by the university while submitting the application form and other information on the answer sheet and also on the question paper instructions’ page.
•	Number of sections, number of questions in each section and number of possible answers for each question can vary.
•	Each correct answer will carry 2 marks and 1/2 mark will be deducted for each incorrect answer.
•	Only use blue or black ink.
•	You are not allowed to use Calculators or lead pencils.
',
            'slug'=>str_slug('Pagination in vue js not working correctly')
        ]);

        Discussion::create([
            'user_id'=>3,
            'channel_id'=>3,
            'title'=>'Vue js event listeners for child component',
            'content'=>'Write your name and registration number allocated to you by the university while submitting the application form and other information on the answer sheet and also on the question paper instructions’ page.
•	Number of sections, number of questions in each section and number of possible answers for each question can vary.

',
            'slug'=>str_slug('Vue js event listeners for child component')
        ]);

        Discussion::create([
            'user_id'=>4,
            'channel_id'=>4,
            'title'=>'Laravel homestead error -undetected database',
            'content'=>'to contents of box no. 6Write your name and registration number allocated to you by the university while submitting the application form and other information on the answer sheet and also on the question paper instructions’ page.
•	Number of sections, number of questions in each section and number of possible answers for each question can vary.
',
            'slug'=>str_slug('Laravel homestead error -undetected database')
        ]);

    }
}
