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
      $questions = [['questions_id' => '1', 'surveys_id' => '1', 'questions_title'=> 'What products do you like?'],['questions_id' => '2', 'surveys_id' => '1', 'questions_title'=> 'How do you rate our services?'],['questions_id' => '3', 'surveys_id' => '1', 'questions_title'=> 'How do you rate our shoes?'],['questions_id' => '4', 'surveys_id' => '1', 'questions_title'=> 'Are you satisfied with our work?'],['questions_id' => '5', 'surveys_id' => '1', 'questions_title'=> 'How do you rate our quality?'],['questions_id' => '6', 'surveys_id' => '2', 'questions_title'=> 'How do you rate our outlet locations?'],['questions_id' => '7', 'surveys_id' => '2', 'questions_title'=> 'How do you rate our products and services?'],['questions_id' => '8', 'surveys_id' => '2', 'questions_title'=> 'How do you rate our materials?'],['questions_id' => '9', 'surveys_id' => '2', 'questions_title'=> 'How do you rate our policies?'],['questions_id' => '10', 'surveys_id' => '2', 'questions_title'=> 'How do you rate our range of products?']];
    \DB::table('questions') -> insert($questions);
    
    }
}