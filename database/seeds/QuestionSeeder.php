<?php

use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questions')->insert([
            'no_question' => 1,
            'question' => "What is your current age?",
            'type' => 'skin',
            'category' => 'single',
            'status' => 'dummy'
        ]);
        
        DB::table('questions')->insert([
            'no_question' => 2,
            'question' => "What is your gender?",
            'type' => 'skin',
            'category' => 'single',
            'status' => 'dummy'
        ]);

        DB::table('questions')->insert([
            'no_question' => 3,
            'question' => "Describe your skin from forehead to chin",
            'type' => 'skin',
            'category' => 'single',
            'status' => 'logic'
        ]);

        DB::table('questions')->insert([
            'no_question' => 4,
            'question' => "How often do you breakout",
            'type' => 'skin',
            'category' => 'single',
            'status' => 'logic'
        ]);

        DB::table('questions')->insert([
            'no_question' => 5,
            'question' => "Any of these skin sensitivities sound familiar? (please select all conditions)",
            'type' => 'skin',
            'category' => 'multiple',
            'status' => 'dummy'
        ]);

        DB::table('questions')->insert([
            'no_question' => 6,
            'question' => "What’s involved in your daily skincare routine? (Select everything you use)",
            'type' => 'skin',
            'category' => 'multiple',
            'status' => 'dummy'
        ]);

        DB::table('questions')->insert([
            'no_question' => 7,
            'question' => "What about makeup? (Select all that apply)",
            'type' => 'skin',
            'category' => 'multiple',
            'status' => 'dummy'
        ]);

        DB::table('questions')->insert([
            'no_question' => 8,
            'question' => "How much do you use? (Select one)",
            'type' => 'skin',
            'category' => 'single',
            'status' => 'dummy'
        ]);

        DB::table('questions')->insert([
            'no_question' => 9,
            'question' => "What would you say is your main skin goal? (Select one)",
            'type' => 'skin',
            'category' => 'single',
            'status' => 'dummy'
        ]);
        DB::table('questions')->insert([
            'no_question' => 1,
            'question' => "Let’s talk about everyday life. What’s your commute like?",
            'type' => 'lifestyle',
            'category' => 'single',
            'status' => 'dummy'
        ]);
        
        DB::table('questions')->insert([
            'no_question' => 2,
            'question' => "How often do you smoke cigarettes? (Select one)",
            'type' => 'lifestyle',
            'category' => 'single',
            'status' => 'dummy'
        ]);

        DB::table('questions')->insert([
            'no_question' => 3,
            'question' => "How many caffeinated benerages do you drink daily? (Coffee, tea, soda, and energy drinks count)",
            'type' => 'lifestyle',
            'category' => 'single',
            'status' => 'dummy'
        ]);

        DB::table('questions')->insert([
            'no_question' => 4,
            'question' => "How often do you feel overwhelmed by stress?",
            'type' => 'lifestyle',
            'category' => 'single',
            'status' => 'dummy'
        ]);

        DB::table('questions')->insert([
            'no_question' => 5,
            'question' => "How many glasses of water do you drink each day?",
            'type' => 'lifestyle',
            'category' => 'single',
            'status' => 'dummy'
        ]);

        DB::table('questions')->insert([
            'no_question' => 6,
            'question' => "What shows up most often on your plate? (Select all that apply)",
            'type' => 'lifestyle',
            'category' => 'single',
            'status' => 'dummy'
        ]);

        DB::table('questions')->insert([
            'no_question' => 7,
            'question' => "How often do you workout?",
            'type' => 'lifestyle',
            'category' => 'single',
            'status' => 'dummy'
        ]);

        DB::table('questions')->insert([
            'no_question' => 1,
            'question' => "We want detect climate & pollution level in your area! Please insert your specific city!",
            'type' => 'environment',
            'category' => 'dropdown',
            'status' => 'dummy'
        ]);
    }
}
