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

      $survey = [['surveys_id' => '1', 'surveys_title' => 'First'],['surveys_id' => '2', 'surveys_title' => 'Second'],['surveys_id' => '3', 'surveys_title' => 'Third'],['surveys_id' => '4', 'surveys_title' => 'Forth'],['surveys_id' => '5', 'surveys_title' => 'Fifth'] ];

    \DB::table('surveys') -> insert($survey);
    
    }
}