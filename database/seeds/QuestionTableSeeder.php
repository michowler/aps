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
      $questions = [['questions_id' => '1', 'surveys_id' => '1'],['questions_id' => '2', 'surveys_id' => '1'],['questions_id' => '3', 'surveys_id' => '1'],['questions_id' => '4', 'surveys_id' => '1'],['questions_id' => '5', 'surveys_id' => '1'],['questions_id' => '6', 'surveys_id' => '2'],['questions_id' => '7', 'surveys_id' => '2'],['questions_id' => '8', 'surveys_id' => '2'],['questions_id' => '9', 'surveys_id' => '2'],['questions_id' => '10', 'surveys_id' => '2']];
    \DB::table('questions') -> insert($questions);
    
    }
}