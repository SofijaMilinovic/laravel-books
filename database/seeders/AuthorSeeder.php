<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{

    protected $authors = [
        [
            'id' => 1,
            'address_id' => 1,
            'firstName' => 'Pera',
            'lastName' => 'Peric',
            'dateOfBirth' => '1980-11-15'
        ],
        [
            'id' => 2,
            'address_id' => 2,
            'firstName' => 'Mika',
            'lastName' => 'Mikic',
            'dateOfBirth' => '1985-09-23'
        ],
        [
            'id' => 3,
            'address_id' => 3,
            'firstName' => 'Zika',
            'lastName' => 'Zikic',
            'dateOfBirth' => '1990-03-05'
        ]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect($this->authors)->each(function($author) {
            \App\Models\Author::factory()->create($author);
        });
    }
}
