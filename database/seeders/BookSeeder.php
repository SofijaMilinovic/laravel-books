<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{

    protected $books = [
        [
            'title' => 'The Power of Your Subconscious Mind',
            'description' => "Dr. Joseph Murphy explains that life events are actually the result of the workings of your conscious and subconscious minds. He suggests practical techniques through which one can change one's destiny, principally by focusing and redirecting this miraculous energy. Years of research studying the world's major religions convinced him that some Great Power lay behind all spiritual life and that this power is within each of us.",
            'author' => 'Joseph Murphy',
            'rating' => 5.0,
            'price' => 15
        ],
        [
            'title' => 'You Are the Placebo: Making Your Mind Matter',
            'description' => "Dr. Joe does more than simply explore the history and the physiology of the placebo effect. He asks the question: “Is it possible to teach the principles of the placebo, and without relying on any external substance, produce the same internal changes in a person’s health and ultimately in his or her life?” Then he shares scientific evidence (including color brain scans) of amazing healings from his workshops, in which participants learn his model of personal transformation, based on practical applications of the so-called placebo effect. The book ends with a “how-to” meditation for changing beliefs and perceptions that hold us back—the first step in healing.",
            'author' => 'Joe Dispenza',
            'rating' => 4.8,
            'price' => 10
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect($this->books)->each(function($book) {
            \App\Models\Book::factory()->create($book);
        });
    }
}
