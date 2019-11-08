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

      $options = [['choices' => '1', 'questions_id' => '1'],['choices' => '2', 'questions_id' => '1'],['choices' => '3', 'questions_id' => '1'],['choices' => '4', 'questions_id' => '1'],['choices' => '1', 'questions_id' => '2'],['choices' => '2', 'questions_id' => '2'],['choices' => '3', 'questions_id' => '2'],['choices' => '4', 'questions_id' => '2'],['choices' => '1', 'questions_id' => '3'],['choices' => '2', 'questions_id' => '3'],['choices' => '3', 'questions_id' => '3'],['choices' => '4', 'questions_id' => '3'],['choices' => '1', 'questions_id' => '4'],['choices' => '2', 'questions_id' => '4'],['choices' => '3', 'questions_id' => '4'],['choices' => '4', 'questions_id' => '4'],['choices' => '1', 'questions_id' => '5'],['choices' => '2', 'questions_id' => '5'],['choices' => '3', 'questions_id' => '5'],['choices' => '4', 'questions_id' => '5']];

    \DB::table('options') -> insert($options);
    
    }
}