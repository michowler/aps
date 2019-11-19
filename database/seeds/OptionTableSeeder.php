<?php
use Illuminate\Database\Seeder;
class OptionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $options = [['options_id' => '1', 'questions_id' => '1', 'choices_id' => '1'],['options_id' => '2', 'questions_id' => '1','choices_id' => '2'],['options_id' => '3', 'questions_id' => '1','choices_id' => '3'],['options_id' => '4', 'questions_id' => '1','choices_id' => '4'],['options_id' => '5', 'questions_id' => '2','choices_id' => '1'],['options_id' => '6', 'questions_id' => '2','choices_id' => '2'],['options_id' => '7', 'questions_id' => '2','choices_id' => '3'],['options_id' => '8', 'questions_id' => '2','choices_id' => '4'],['options_id' => '9', 'questions_id' => '3','choices_id' => '1'],['options_id' => '10', 'questions_id' => '3','choices_id' => '2'],['options_id' => '11', 'questions_id' => '3','choices_id' => '3'],['options_id' => '12', 'questions_id' => '3','choices_id' => '4'],['options_id' => '13', 'questions_id' => '4','choices_id' => '1'],['options_id' => '14', 'questions_id' => '4','choices_id' => '2'],['options_id' => '15', 'questions_id' => '4','choices_id' => '3'],['options_id' => '16', 'questions_id' => '4','choices_id' => '4'],['options_id' => '17', 'questions_id' => '5','choices_id' => '1'],['options_id' => '18', 'questions_id' => '5','choices_id' => '2'],['options_id' => '19', 'questions_id' => '5','choices_id' => '3'],['options_id' => '20', 'questions_id' => '5','choices_id' => '4']];
    \DB::table('options') -> insert($options);
    
    }
}