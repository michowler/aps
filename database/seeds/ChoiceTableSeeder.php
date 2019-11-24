<?php

use Illuminate\Database\Seeder;

class ChoiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $choice = [['choices_id' => '1', 'choice' => 'Very Bad'],['choices_id' => '2', 'choice' => 'Bad'],['choices_id' => '3', 'choice' => 'Good'],['choices_id' => '4', 'choice' => 'Very Good']];


    \DB::table('choices') -> insert($choice);
    
    }
}