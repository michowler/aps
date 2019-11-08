<?php

use Illuminate\Database\Seeder;

class RespondentsOptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $respondents_option = [
      ['respondents_options_id' => '1', 'users_id' => '1', 'surveys_id' => '1','questions_id' => '1', 'options_id' => '1'],
        ['respondents_options_id' => '2', 'users_id' => '1', 'surveys_id' => '1','questions_id' => '2', 'options_id' => '2'],
        ['respondents_options_id' => '3', 'users_id' => '1', 'surveys_id' => '1','questions_id' => '3', 'options_id' => '2'],
        ['respondents_options_id' => '4', 'users_id' => '1', 'surveys_id' => '1','questions_id' => '4', 'options_id' => '3'],
        ['respondents_options_id' => '5', 'users_id' => '1', 'surveys_id' => '1','questions_id' => '5', 'options_id' => '4'],
        ['respondents_options_id' => '6', 'users_id' => '2', 'surveys_id' => '1','questions_id' => '1', 'options_id' => '4'],
        ['respondents_options_id' => '7', 'users_id' => '2', 'surveys_id' => '1','questions_id' => '2', 'options_id' => '1'],
        ['respondents_options_id' => '8', 'users_id' => '2', 'surveys_id' => '1','questions_id' => '3', 'options_id' => '1'],
        ['respondents_options_id' => '9', 'users_id' => '2', 'surveys_id' => '1','questions_id' => '4', 'options_id' => '2'],
        ['respondents_options_id' => '10', 'users_id' => '2', 'surveys_id' => '1','questions_id' => '5', 'options_id' => '3'],
        ['respondents_options_id' => '11', 'users_id' => '3', 'surveys_id' => '1','questions_id' => '1', 'options_id' => '2'],
        ['respondents_options_id' => '12', 'users_id' => '3', 'surveys_id' => '1','questions_id' => '2', 'options_id' => '4'],
        ['respondents_options_id' => '13', 'users_id' => '3', 'surveys_id' => '1','questions_id' => '3', 'options_id' => '1'],
        ['respondents_options_id' => '14', 'users_id' => '3', 'surveys_id' => '1','questions_id' => '4', 'options_id' => '3'],
        ['respondents_options_id' => '15', 'users_id' => '3', 'surveys_id' => '1','questions_id' => '5', 'options_id' => '4'],
        ['respondents_options_id' => '16', 'users_id' => '4', 'surveys_id' => '1','questions_id' => '1', 'options_id' => '1'],
        ['respondents_options_id' => '17', 'users_id' => '4', 'surveys_id' => '1','questions_id' => '2', 'options_id' => '1'],
        ['respondents_options_id' => '18', 'users_id' => '4', 'surveys_id' => '1','questions_id' => '3', 'options_id' => '4'],
        ['respondents_options_id' => '19', 'users_id' => '4', 'surveys_id' => '1','questions_id' => '4', 'options_id' => '1'],
        ['respondents_options_id' => '20', 'users_id' => '4', 'surveys_id' => '1','questions_id' => '5', 'options_id' => '2'],
        ['respondents_options_id' => '21', 'users_id' => '5', 'surveys_id' => '1','questions_id' => '1', 'options_id' => '2'],
        ['respondents_options_id' => '22', 'users_id' => '5', 'surveys_id' => '1','questions_id' => '2', 'options_id' => '3'],
        ['respondents_options_id' => '23', 'users_id' => '5', 'surveys_id' => '1','questions_id' => '3', 'options_id' => '4'],
        ['respondents_options_id' => '24', 'users_id' => '5', 'surveys_id' => '1','questions_id' => '4', 'options_id' => '3'],
        ['respondents_options_id' => '25', 'users_id' => '5', 'surveys_id' => '1','questions_id' => '5', 'options_id' => '1']];

    \DB::table('tag_respondents_options') -> insert($respondents_option);
    
    }
}
