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
      ['respondents_options_id' => '1', 'users_id' => '1', 'surveys_id' => '1','questions_id' => '1', 'choices_id' => '1', 'options_id' => '1'],
        ['respondents_options_id' => '2', 'users_id' => '1', 'surveys_id' => '1','questions_id' => '2', 'choices_id' => '2', 'options_id' => '1'],
        ['respondents_options_id' => '3', 'users_id' => '1', 'surveys_id' => '1','questions_id' => '3', 'choices_id' => '2', 'options_id' => '1'],
        ['respondents_options_id' => '4', 'users_id' => '1', 'surveys_id' => '1','questions_id' => '4', 'choices_id' => '3', 'options_id' => '1'],
        ['respondents_options_id' => '5', 'users_id' => '1', 'surveys_id' => '1','questions_id' => '5', 'choices_id' => '4', 'options_id' => '1'],
        ['respondents_options_id' => '6', 'users_id' => '2', 'surveys_id' => '1','questions_id' => '1', 'choices_id' => '4', 'options_id' => '1'],
        ['respondents_options_id' => '7', 'users_id' => '2', 'surveys_id' => '1','questions_id' => '2', 'choices_id' => '1', 'options_id' => '1'],
        ['respondents_options_id' => '8', 'users_id' => '2', 'surveys_id' => '1','questions_id' => '3', 'choices_id' => '1', 'options_id' => '1'],
        ['respondents_options_id' => '9', 'users_id' => '2', 'surveys_id' => '1','questions_id' => '4', 'choices_id' => '2', 'options_id' => '1'],
        ['respondents_options_id' => '10', 'users_id' => '2', 'surveys_id' => '1','questions_id' => '5', 'choices_id' => '3', 'options_id' => '1'],
        ['respondents_options_id' => '11', 'users_id' => '3', 'surveys_id' => '1','questions_id' => '1', 'choices_id' => '2', 'options_id' => '1'],
        ['respondents_options_id' => '12', 'users_id' => '3', 'surveys_id' => '1','questions_id' => '2', 'choices_id' => '4', 'options_id' => '1'],
        ['respondents_options_id' => '13', 'users_id' => '3', 'surveys_id' => '1','questions_id' => '3', 'choices_id' => '1', 'options_id' => '1'],
        ['respondents_options_id' => '14', 'users_id' => '3', 'surveys_id' => '1','questions_id' => '4', 'choices_id' => '3', 'options_id' => '1'],
        ['respondents_options_id' => '15', 'users_id' => '3', 'surveys_id' => '1','questions_id' => '5', 'choices_id' => '4', 'options_id' => '1'],
        ['respondents_options_id' => '16', 'users_id' => '4', 'surveys_id' => '1','questions_id' => '1', 'choices_id' => '1', 'options_id' => '1'],
        ['respondents_options_id' => '17', 'users_id' => '4', 'surveys_id' => '1','questions_id' => '2', 'choices_id' => '1', 'options_id' => '1'],
        ['respondents_options_id' => '18', 'users_id' => '4', 'surveys_id' => '1','questions_id' => '3', 'choices_id' => '4', 'options_id' => '1'],
        ['respondents_options_id' => '19', 'users_id' => '4', 'surveys_id' => '1','questions_id' => '4', 'choices_id' => '1', 'options_id' => '1'],
        ['respondents_options_id' => '20', 'users_id' => '4', 'surveys_id' => '1','questions_id' => '5', 'choices_id' => '2', 'options_id' => '1'],
        ['respondents_options_id' => '21', 'users_id' => '5', 'surveys_id' => '1','questions_id' => '1', 'choices_id' => '2', 'options_id' => '1'],
        ['respondents_options_id' => '22', 'users_id' => '5', 'surveys_id' => '1','questions_id' => '2', 'choices_id' => '3', 'options_id' => '1'],
        ['respondents_options_id' => '23', 'users_id' => '5', 'surveys_id' => '1','questions_id' => '3', 'choices_id' => '4', 'options_id' => '1'],
        ['respondents_options_id' => '24', 'users_id' => '5', 'surveys_id' => '1','questions_id' => '4', 'choices_id' => '3', 'options_id' => '1'],
        ['respondents_options_id' => '25', 'users_id' => '5', 'surveys_id' => '1','questions_id' => '5', 'choices_id' => '2', 'options_id' => '1'],
        ['respondents_options_id' => '26', 'users_id' => '1', 'surveys_id' => '2','questions_id' => '6', 'choices_id' => '4', 'options_id' => '1'],
        ['respondents_options_id' => '27', 'users_id' => '1', 'surveys_id' => '2','questions_id' => '7', 'choices_id' => '1', 'options_id' => '1'],
        ['respondents_options_id' => '28', 'users_id' => '1', 'surveys_id' => '2','questions_id' => '8', 'choices_id' => '2', 'options_id' => '1'],
        ['respondents_options_id' => '29', 'users_id' => '1', 'surveys_id' => '2','questions_id' => '9', 'choices_id' => '1', 'options_id' => '1'],
        ['respondents_options_id' => '30', 'users_id' => '1', 'surveys_id' => '2','questions_id' => '10', 'choices_id' => '2', 'options_id' => '1'],
        ['respondents_options_id' => '31', 'users_id' => '2', 'surveys_id' => '2','questions_id' => '6', 'choices_id' => '3', 'options_id' => '1'],
        ['respondents_options_id' => '32', 'users_id' => '2', 'surveys_id' => '2','questions_id' => '7', 'choices_id' => '4', 'options_id' => '1'],
        ['respondents_options_id' => '33', 'users_id' => '2', 'surveys_id' => '2','questions_id' => '8', 'choices_id' => '1', 'options_id' => '1'],
        ['respondents_options_id' => '34', 'users_id' => '2', 'surveys_id' => '2','questions_id' => '9', 'choices_id' => '1', 'options_id' => '1'],
        ['respondents_options_id' => '35', 'users_id' => '2', 'surveys_id' => '2','questions_id' => '10', 'choices_id' => '4', 'options_id' => '1'],
        ['respondents_options_id' => '36', 'users_id' => '3', 'surveys_id' => '2','questions_id' => '6', 'choices_id' => '2', 'options_id' => '1'],
        ['respondents_options_id' => '37', 'users_id' => '3', 'surveys_id' => '2','questions_id' => '7', 'choices_id' => '1', 'options_id' => '1'],
        ['respondents_options_id' => '38', 'users_id' => '3', 'surveys_id' => '2','questions_id' => '8', 'choices_id' => '2', 'options_id' => '1'],
        ['respondents_options_id' => '39', 'users_id' => '3', 'surveys_id' => '2','questions_id' => '9', 'choices_id' => '1', 'options_id' => '1'],
        ['respondents_options_id' => '40', 'users_id' => '3', 'surveys_id' => '2','questions_id' => '10', 'choices_id' => '1', 'options_id' => '1'],
        ['respondents_options_id' => '41', 'users_id' => '4', 'surveys_id' => '2','questions_id' => '6', 'choices_id' => '2', 'options_id' => '1'],
        ['respondents_options_id' => '42', 'users_id' => '4', 'surveys_id' => '2','questions_id' => '7', 'choices_id' => '4', 'options_id' => '1'],
        ['respondents_options_id' => '43', 'users_id' => '4', 'surveys_id' => '2','questions_id' => '8', 'choices_id' => '3', 'options_id' => '1'],
        ['respondents_options_id' => '44', 'users_id' => '4', 'surveys_id' => '2','questions_id' => '9', 'choices_id' => '2', 'options_id' => '1'],
        ['respondents_options_id' => '45', 'users_id' => '4', 'surveys_id' => '2','questions_id' => '10', 'choices_id' => '2', 'options_id' => '1'],
        ['respondents_options_id' => '46', 'users_id' => '5', 'surveys_id' => '2','questions_id' => '6', 'choices_id' => '2', 'options_id' => '1'],
        ['respondents_options_id' => '47', 'users_id' => '5', 'surveys_id' => '2','questions_id' => '7', 'choices_id' => '3', 'options_id' => '1'],
        ['respondents_options_id' => '48', 'users_id' => '5', 'surveys_id' => '2','questions_id' => '8', 'choices_id' => '1', 'options_id' => '1'],
        ['respondents_options_id' => '49', 'users_id' => '5', 'surveys_id' => '2','questions_id' => '9', 'choices_id' => '3', 'options_id' => '1'],
        ['respondents_options_id' => '50', 'users_id' => '5', 'surveys_id' => '2','questions_id' => '10', 'choices_id' => '1', 'options_id' => '1']];
    \DB::table('tag_respondents_options') -> insert($respondents_option);
    
    }
}