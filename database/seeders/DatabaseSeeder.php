<?php

namespace Database\Seeders;

use App\Models\Question;
use App\Models\Option;
use App\Models\HelpCentre;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        HelpCentre::factory(10)->create();

        Question::truncate();

        Question::factory([
            'id'       => 114,
            'question' => 'Please enter your date of birth'
            ])->create();

        Question::factory(['id' => 1, 'question' => 'Have you ever engaged in any sexual activity'])
            ->has(Option::factory('options')
                ->count(3)
                ->state(new Sequence(
                    ['option' => 'Yes', 'point' => 0],
                    ['option' => 'No', 'point' => 1],
                    ['option' => 'I rather not say', 'point' => 1],
                ))
            )->create();
        
        Question::factory(['id' => 2, 'question' => 'When was your last HIV test'])
            ->has(Option::factory('options')
                ->count(4)
                ->state(new Sequence(
                    ['option' => 'Within the past 3 months', 'point' => 0],
                    ['option' => 'Between 3 to 6 months', 'point' => 1],
                    ['option' => 'More than 6 months', 'point' => 1],
                    ['option' => 'Never', 'point' => 1],
                ))
            )->create();

        Question::factory(['id' => 3, 'question' => 'What was your HIV status'])
            ->has(Option::factory('options')
                ->count(3)
                ->state(new Sequence(
                    ['option' => 'Negative', 'point' => 0],
                    ['option' => 'Positive', 'point' => 0],
                    ['option' => 'Not sure', 'point' => 1],
                ))
            )->create();
        
        Question::factory(['id' => 4, 'question' => 'Are you taking PrEP (Pre-Exposure Prophylaxis)'])
            ->has(Option::factory('options')
                ->count(3)
                ->state(new Sequence(
                    ['option' => 'I take PrEP everyday', 'point' => 0],
                    ['option' => 'I take PrEP but not everyday', 'point' => 1],
                    ['option' => 'I do not take PrEP', 'point' => 1],
                ))
            )->create();
        
        Question::factory(['id' => 5, 'question' => 'How often are you taking treatment'])
            ->has(Option::factory('options')
                ->count(3)
                ->state(new Sequence(
                    ['option' => 'Everyday', 'point' => 0],
                    ['option' => 'Somedays', 'point' => 1],
                    ['option' => 'No longer taking treament', 'point' => 1],
                ))
            )->create();
        
        Question::factory(['id' => 6, 'question' => 'Which of the following applies to you'])
            ->has(Option::factory('options')
                ->count(2)
                ->state(new Sequence(
                    ['option' => 'I meet regularly with my doctor for PrEP Care (STI testing and Lab tests', 'point' => 0],
                    ['option' => 'I take PrEP without seeing a doctor regularly', 'point' => 1],
                ))
            )->create();
        
        Question::factory(['id' => 7, 'question' => 'Which of the following applies to you'])
            ->has(Option::factory('options')
                ->count(5)
                ->state(new Sequence(
                    ['option' => 'My viral load is suppressed or undetectable (as told by my doctor or lab test)', 'point' => 0],
                    ['option' => 'I am not sure about my viral load, but I have been taking HIV treatment every day for the last 6 months or more', 'point' => 1],
                    ['option' => 'Not there yet', 'point' => 1],
                    ['option' => 'I do not knowthe HIV status of my sexual partner', 'point' => 1],
                    ['option' => 'None of the above or not sure', 'point' => 1],
                ))
            )->create();
        
        Question::factory(['id' => 9, 'question' => 'How do you identify your gender today'])
            ->has(Option::factory('options')
                ->count(5)
                ->state(new Sequence(
                    ['option' => 'Male', 'point' => 0],
                    ['option' => 'Female', 'point' => 1],
                    ['option' => 'Transgender', 'point' => 1],
                    ['option' => 'Rather not say', 'point' => 0],
                    ['option' => 'Others', 'point' => 1],
                ))
            )->create();
        
        Question::factory(['id' => 10, 'question' => 'What was your sex assigned at birth'])
            ->has(Option::factory('options')
                ->count(2)
                ->state(new Sequence(
                    ['option' => 'Male', 'point' => 0],
                    ['option' => 'Female', 'point' => 0],
                ))
            )->create();

        Question::factory(['id' => 11, 'question' => 'Who do you have sex with'])
            ->has(Option::factory('options')
                ->count(4)
                ->state(new Sequence(
                    ['option' => 'Men', 'point' => 0],
                    ['option' => 'Women', 'point' => 0],
                    ['option' => 'Both men and women', 'point' => 1],
                    ['option' => 'Not having sex yet', 'point' => 0],
                ))
            )->create();

        Question::factory(['id' => 8, 'question' => 'Do you participate in support group meetings'])
            ->has(Option::factory('options')
                ->count(3)
                ->state(new Sequence(
                    ['option' => 'Always', 'point' => 0],
                    ['option' => 'Sometimes', 'point' => 1],
                    ['option' => 'Never', 'point' => 1],
                ))
            )->create();

        Question::factory(['id' => 12, 'question' => 'Have you experienced any of the following since your last HIV test'])
            ->has(Option::factory('options')
                ->count(8)
                ->state(new Sequence(
                    ['option' => 'Sex without a condom', 'point' => 1],
                    ['option' => 'I shared a needle with someone else', 'point' => 1],
                    ['option' => 'Unscreened blood transfusion', 'point' => 1],
                    ['option' => 'Blood oath taking', 'point' => 1],
                    ['option' => 'Caesarian session', 'point' => 1],
                    ['option' => 'Female Genital Mutilation', 'point' => 1],
                    ['option' => 'Had an abortion', 'point' => 1],
                    ['option' => 'None of these', 'point' => 0],
                ))
            )->create();

        Question::factory(['id' => 13, 'question' => 'Have you experienced any of the following the last 6 months and select all that apply'])
            ->has(Option::factory('options')
                ->count(7)
                ->state(new Sequence(
                    ['option' => 'Injected drugs not from a medical professional', 'point' => 1],
                    ['option' => 'Received money or goods in exchange for sex', 'point' => 1],
                    ['option' => 'Multiple Sexual Partners', 'point' => 1],
                    ['option' => 'Sex without my consent (forced sex, rape or coerced sex with someone you highly respect)', 'point' => 1],
                    ['option' => 'Had an STI or STI symptoms', 'point' => 1],
                    ['option' => 'Alcohol or drugs before sex', 'point' => 1],
                    ['option' => 'None of these', 'point' => 0],
                ))
            )->create();
    }
}
