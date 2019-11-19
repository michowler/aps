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

      $choice = [['choices_id' => '1', 'choice' => 'A'],['choices_id' => '2', 'choice' => 'B'],['choices_id' => '3', 'choice' => 'C'],['choices_id' => '4', 'choice' => 'D']];


    \DB::table('choices') -> insert($choice);
    
    }
}