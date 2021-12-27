<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{

    protected $books = [
        [
            'id' => 1,
            'title' => 'The Power of Your Subconscious Mind',
            'description' => 'This book explains that life events are actually the result of the workings of your conscious and subconscious minds.',
            'author_id' => 1,
            'rating' => 5.0,
            'price' => 15
        ],
        [
            'id' => 2,
            'title' => 'You Are the Placebo: Making Your Mind Matter',
            'description' => 'This book asks the question: Is it possible to teach the principles of the placebo, and without relying on any external substance, produce the same internal changes in a person’s health and ultimately in his or her life?',
            'author_id' => 1,
            'rating' => 4.8,
            'price' => 10
        ],
        [
            'id' => 3,
            'title' => 'Feeling is the Secret',
            'description' => 'Think feelingly only of the state you desire to realize. Feeling the reality of the state sought and living and acting on that conviction is the way of all seeming miracles. All changes of expression are brought about through a change of feeling. A change of feeling is a change of destiny.',
            'author_id' => 2,
            'rating' => 4.9,
            'price' => 5
        ]
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
