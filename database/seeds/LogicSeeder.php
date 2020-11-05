<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LogicSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        $opt3 = ['Dry or rough', 'Oily all over', 'Excess oil on t-zone', 'Uneven tone', 'Lines and creases', 'All is well'];
        $opt4 = ['Rarely see a spot', 'Few times a month', 'Seems forever', 'All clear here'];
        $face_result = ['Dry', 'Dry', 'Sensitive & acne', 'Dry', 'Oily', 'Acne', 'Acne', 'Oily', 'Oily', 'Acne', 'Acne', 'Oily', 'Unbright', 'Unbright', 'Super black spot & acne', 'Unbright', 'Wrinkle', 'Wrinkle', 'Sensitive wrinkle & acne', 'Wrinkle', 'Normal', 'Normal', 'Acne', 'Normal'];
        $face_title = [
        'Your acne was very terrible!', 
        'Your acne was very terrible!', 
        'Your acne was very terrible!', 
        'Your acne was very terrible!', 
        'Your acne was very terrible!', 
        'Your acne was very terrible!', 
        'Your acne was very terrible!', 
        'Your acne was very terrible!', 
        'Your acne was very terrible!', 
        'Your acne was very terrible!', 
        'Your acne was very terrible!', 
        'Your acne was very terrible!', 
        'Your acne was very terrible!', 
        'Your acne was very terrible!', 
        'Your acne was very terrible!', 
        'Your acne was very terrible!', 
        'Your acne was very terrible!', 
        'Your acne was very terrible!', 
        'Your acne was very terrible!', 
        'Your acne was very terrible!', 
        'Your acne was very terrible!', 
        'Your acne was very terrible!', 
        'Your acne was very terrible!',
        'Your acne was very terrible!'
        ];
        $face_desc = [
            'Dry skin can be itchy, and it may look flaky and bumpy or have red patches. Dehydrated skin lacks water and appears dull or rough.
            It’s better to use moisturizers in the sheet mask. Our formula can lock the hydration to prevent you from dryness.',
            'Dry skin can be itchy, and it may look flaky and bumpy or have red patches. Dehydrated skin lacks water and appears dull or rough.
            It’s better to use moisturizers in the sheet mask. Our formula can lock the hydration to prevent you from dryness.',
            'Dry skin can be itchy, and it may look flaky and bumpy or have red patches. Dehydrated skin lacks water and appears dull or rough.
            But sometimes your skin was very sensitive that causing acne or some inflammatory. Try the super moisturizer & the pure pitera water, a technology from Japan! All packed in your sheet mask.',
            'Dry skin can be itchy, and it may look flaky and bumpy or have red patches. Dehydrated skin lacks water and appears dull or rough.
            It’s better to use moisturizers in the sheet mask. Our formula can lock the hydration to prevent you from dryness.',
            "Too much sebum, however, may lead to oily skin, which can lead to clogged pores and acne. Genetics, hormone changes, or even stress may increase sebum production. You have very high sensitive skin to acne, let's to prevent it before late!",
            'Too much sebum, however, may lead to oily skin, which can lead to clogged pores and acne. Genetics, hormone changes, or even stress may increase sebum production. You have very high sensitive skin to acne. Try to remove the acne & its black spot with our sheet mask!',
            'Too much sebum, however, may lead to oily skin, which can lead to clogged pores and acne. Genetics, hormone changes, or even stress may increase sebum production. You have very high sensitive skin to acne. Try to remove the acne & its black spot with our sheet mask!',
            "Too much sebum, however, may lead to oily skin, which can lead to clogged pores and acne. Genetics, hormone changes, or even stress may increase sebum production. You have very high sensitive skin to acne, let's to prevent it before late!",
            "Too much sebum, however, may lead to oily skin, which can lead to clogged pores and acne. Genetics, hormone changes, or even stress may increase sebum production. You have very high sensitive skin to acne, let's to prevent it before late!",
            "Too much sebum, however, may lead to oily skin, which can lead to clogged pores and acne. Genetics, hormone changes, or even stress may increase sebum production. You have very high sensitive skin to acne. Try to remove the acne & its black spot with our sheet mask!",
            "Too much sebum, however, may lead to oily skin, which can lead to clogged pores and acne. Genetics, hormone changes, or even stress may increase sebum production. You have very high sensitive skin to acne. Try to remove the acne & its black spot with our sheet mask!",
            "Too much sebum, however, may lead to oily skin, which can lead to clogged pores and acne. Genetics, hormone changes, or even stress may increase sebum production. You have very high sensitive skin to acne, let's to prevent it before late!",
            "The trouble begins when your uneven skin tone begins presenting itself in blotchy patches or dark spots known. You might have highly UV exposure & unhydrate skin. Let's splash your face using Pitera pure water from Japan!",
            "The trouble begins when your uneven skin tone begins presenting itself in blotchy patches or dark spots known. You might have highly UV exposure & unhydrate skin. Let's splash your face using Pitera pure water from Japan!",
            "Too much sebum, however, may lead to oily skin, which can lead to clogged pores and acne. Genetics, hormone changes, or even stress may increase sebum production. You have very high sensitive skin to acne. Try to remove the acne & its black spot with our sheet mask!",
            "The trouble begins when your uneven skin tone begins presenting itself in blotchy patches or dark spots known. You might have highly UV exposure & unhydrate skin. Let's splash your face using Pitera pure water from Japan!",
            "Sun damage, smoking, dehydration, some medications, and environmental and genetic factors affect when and where people will develop wrinkles. Remove every wrinkle lines by using our Pitera pure water which squeezed in sheet mask!",
            "Sun damage, smoking, dehydration, some medications, and environmental and genetic factors affect when and where people will develop wrinkles. Remove every wrinkle lines by using our Pitera pure water which squeezed in sheet mask!",
            "Sun damage, smoking, dehydration, some medications, and environmental and genetic factors affect when and where people will develop wrinkles. Also, your acne add the skin complexity. Remove every wrinkle lines by using our Pitera pure water and remove all acne just in a week!",
            "Sun damage, smoking, dehydration, some medications, and environmental and genetic factors affect when and where people will develop wrinkles. Remove every wrinkle lines by using our Pitera pure water which squeezed in sheet mask!",
            "As a person with normal skin ages, their skin can become dryer. You can't let the pollution, stress, or other external factors damage your face. Keep locking your beautiful face using moisturizer!",
            "As a person with normal skin ages, their skin can become dryer. You can't let the pollution, stress, or other external factors damage your face. Keep locking your beautiful face using moisturizer and bump it with our snail extract!",
            "Too much sebum, however, may lead to oily skin, which can lead to clogged pores and acne. Genetics, hormone changes, or even stress may increase sebum production. You have very high sensitive skin to acne. Try to remove the acne & its black spot with our sheet mask!",
            "As a person with normal skin ages, their skin can become dryer. You can't let the pollution, stress, or other external factors damage your face. Keep locking your beautiful face using moisturizer!"
        ];
        $special = ['Super moisturizer', 'Super moisturizer', 'Super moisturizer & pitera', 'Super moisturizer', 'Salicylic acid & snail extract', 'Salicylic acid & snail extract', 'Salicylic acid & snail extract', 'Salicylic acid & snail extract', 'Salicylic acid & snail extract', 'Salicylic acid & snail extract', 'Salicylic acid & snail extract', 'Salicylic acid & snail extract', 'Pitera & super whitening extract', 'Pitera & super whitening extract', 'Salicylic acid & snail extract', 'Pitera & super whitening extract', 'Pitera', 'Pitera', 'Pitera & salicylic acid', 'Pitera', 'Super moisturizer', 'Moisturizer & snail extract', 'Salicylic acid & snail extract', 'Super moisturizer'];
        $formula = ['1100', '1100', '1200', '1100', '3400', '3400', '3400', '3400', '3400', '3400', '3400', '3400', '2600', '2600', '3400', '2600', '2200', '2200', '2300', '2200', '1100', '1300', '3400', '1100'];
        $face_icon = ['skin_redness.png' , 'skin_redness.png', 'skin_redness.png', 'skin_redness.png', 'skin_oily.png', 'skin_acne.png', 'skin_acne.png', 'skin_oily.png', 'skin_oily.png', 'skin_acne.png', 'skin_acne.png', 'skin_oily.png', 'skin_pigment spots.png', 'skin_pigment spots.png', 'skin_pigment spots.png', 'skin_pigment spots.png', 'skin_wrinkles.png', 'skin_wrinkles.png', 'skin_wrinkles.png', 'skin_wrinkles.png', 'skin_normal.png', 'skin_normal.png' , 'skin_acne.png', 'skin_normal.png'];

        $row = 0;
        foreach ($opt3 as $key => $value) {
            foreach ($opt4 as $key_2 => $value_2) {
                DB::table('logics')->insert([
                    'option_3' => $value,
                    'option_4' => $value_2,
                    'face_result' => $face_result[$row],
                    'face_title' => $face_title[$row],
                    'face_description' => $face_desc[$row],
                    'special_ingredients' => $special[$row],
                    'no_formula' => $formula[$row],
                    'face_icon' => $face_icon[$row]
                ]);
                $row += 1;
            }
        }

    }
}
