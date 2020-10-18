<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $opt1 = ['Under 18', '19-29', '30-39', '40-49', '50-59', '60+'];
        $opt2 = ['Male', 'Female'];
        $opt3 = ['Dry or rough', 'Oily all over', 'Excess oil on t-zone', 'Uneven tone', 'Lines and creases', 'All is well'];
        $opt4 = ['Rarely see a spot', 'Few times a month', 'Seems forever', 'All clear here'];
        $opt5 = ['Irritated', 'Itchy', 'Dry', 'Red', 'Blotchy', 'None'];
        $opt6 = ['Cleansers', 'Toners', 'Serum', 'Moisturizers', 'Eye creams'];
        $opt7 = ['Primer or concealer', 'Foundation cream or powder', 'BB cream', 'Lipstick or mascara', 'Contours or highlighters', 'All natural'];
        $opt8 = ['I prefer natural skin', 'Light coverage', 'Not too light, not too heavy', 'Bold and layered'];
        $opt9 = ['Keep clear', 'Even tone', 'Blur fine lines', 'Boost hydration', 'Be less oily', 'Maintain current status'];

        $opt10 = ['Bike / motorcycle', 'Bus', 'Subway/train', 'Walk', 'Car'];
        $opt11 = ['Daily', 'Rarely', 'I’m around smokers', 'I don’t smoke'];
        $opt12 = ['0-2', '3-4', '5-7', '7+'];
        $opt13 = ['Rarely', 'Few times', 'Twice a week', 'All day, literally every day'];
        $opt14 = ['4 or less', '5 to 7', '8 to 10', '11 to 13', '14 or more'];
        $opt15 = ['Cheese', 'Eggs', 'Poultry', 'Fruits & veggies', 'Grains & breads', 'None of these'];
        $opt16 = ['Rarely', 'Few times', 'Twice a week', 'Every day'];

        $opt17 = ['DKI Jakarta', 'Bandung', 'Depok', 'Tangerang', 'Bogor', 'Bekasi', 'Other'];

        foreach ($opt1 as $key => $value) {
            DB::table('options')->insert([
                'question_id' => 1,
                'value' => ($key + 1),
                'text' => $value
            ]);
        }

        foreach ($opt2 as $key => $value) {
            DB::table('options')->insert([
                'question_id' => 2,
                'value' => ($key + 1),
                'text' => $value
            ]);
        }

        foreach ($opt3 as $key => $value) {
            DB::table('options')->insert([
                'question_id' => 3,
                'value' => ($key + 1),
                'text' => $value
            ]);
        }

        foreach ($opt4 as $key => $value) {
            DB::table('options')->insert([
                'question_id' => 4,
                'value' => ($key + 1),
                'text' => $value
            ]);
        }

        foreach ($opt5 as $key => $value) {
            DB::table('options')->insert([
                'question_id' => 5,
                'value' => ($key + 1),
                'text' => $value
            ]);
        }

        foreach ($opt6 as $key => $value) {
            DB::table('options')->insert([
                'question_id' => 6,
                'value' => ($key + 1),
                'text' => $value
            ]);
        }

        foreach ($opt7 as $key => $value) {
            DB::table('options')->insert([
                'question_id' => 7,
                'value' => ($key + 1),
                'text' => $value
            ]);
        }

        foreach ($opt8 as $key => $value) {
            DB::table('options')->insert([
                'question_id' => 8,
                'value' => ($key + 1),
                'text' => $value
            ]);
        }

        foreach ($opt9 as $key => $value) {
            DB::table('options')->insert([
                'question_id' => 9,
                'value' => ($key + 1),
                'text' => $value
            ]);
        }

        foreach ($opt10 as $key => $value) {
            DB::table('options')->insert([
                'question_id' => 10,
                'value' => ($key + 1),
                'text' => $value
            ]);
        }

        foreach ($opt11 as $key => $value) {
            DB::table('options')->insert([
                'question_id' => 11,
                'value' => ($key + 1),
                'text' => $value
            ]);
        }

        foreach ($opt12 as $key => $value) {
            DB::table('options')->insert([
                'question_id' => 12,
                'value' => ($key + 1),
                'text' => $value
            ]);
        }

        foreach ($opt13 as $key => $value) {
            DB::table('options')->insert([
                'question_id' => 13,
                'value' => ($key + 1),
                'text' => $value
            ]);
        }

        foreach ($opt14 as $key => $value) {
            DB::table('options')->insert([
                'question_id' => 14,
                'value' => ($key + 1),
                'text' => $value
            ]);
        }

        foreach ($opt15 as $key => $value) {
            DB::table('options')->insert([
                'question_id' => 15,
                'value' => ($key + 1),
                'text' => $value
            ]);
        }

        foreach ($opt16 as $key => $value) {
            DB::table('options')->insert([
                'question_id' => 16,
                'value' => ($key + 1),
                'text' => $value
            ]);
        }

        foreach ($opt17 as $key => $value) {
            DB::table('options')->insert([
                'question_id' => 17,
                'value' => ($key + 1),
                'text' => $value
            ]);
        }
    }
}
