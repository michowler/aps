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
      $survey = [['surveys_id' => '1', 'surveys_title' => 'Subway Customer Feedback', 'surveys_description'=> 'To improve our services by engaging responses from customers','users_id' => '2', 'vouchers_id'=> '1', 'status'=>'1'], ['surveys_id' => '2', 'surveys_title' => 'Adidas Product Feedback', 'surveys_description'=> 'To improve our product quality by engaging responses from customers','users_id' => '2', 'vouchers_id'=> '1', 'status'=>'1'], ['surveys_id' => '3', 'surveys_title' => 'Tesco Customer Feedback', 'surveys_description'=> 'To improve Tesco\'s services by engaging responses from customers','users_id' => '2', 'vouchers_id'=> '1', 'status'=>'1']];

    \DB::table('surveys') -> insert($survey);
    
    }
}