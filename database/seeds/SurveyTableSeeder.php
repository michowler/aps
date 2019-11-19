<?php
use Illuminate\Database\Seeder;
class SurveyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $survey = [['surveys_id' => '1', 'surveys_title' => 'First','users_id' => '1'],['surveys_id' => '2', 'surveys_title' => 'Second','users_id' => '1'],['surveys_id' => '3', 'surveys_title' => 'Third','users_id' => '1'],['surveys_id' => '4', 'surveys_title' => 'Forth','users_id' => '1'],['surveys_id' => '5', 'surveys_title' => 'Fifth','users_id' => '1'],['surveys_id' => '6', 'surveys_title' => 'First','users_id' => '2'],['surveys_id' => '7', 'surveys_title' => 'First','users_id' => '2'] ,['surveys_id' => '8', 'surveys_title' => 'First','users_id' => '2']];
      
    \DB::table('surveys') -> insert($survey);
    
    }
}