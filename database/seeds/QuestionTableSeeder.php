<?php

use Illuminate\Database\Seeder;

class QuestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $questions = [['questions_id' => '1', 'surveys_id' => '1'],['questions_id' => '2', 'surveys_id' => '1'],['questions_id' => '3', 'surveys_id' => '1'],['questions_id' => '4', 'surveys_id' => '1'],['questions_id' => '5', 'surveys_id' => '1']];

    \DB::table('questions') -> insert($questions);
    
    }
}