<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{

    protected $addresses = [
        [
            'id' => 1,
            'country' => 'Serbia',
            'city' => 'Belgrade',
            'zipCode' => '11000',
            'streetName' => 'Ivankovacka',
            'streetNumber' => 2
        ],
        [
            'id' => 2,
            'country' => 'Serbia',
            'city' => 'Belgrade',
            'zipCode' => '11000',
            'streetName' => 'Svetozara Corovica',
            'streetNumber' => 5
        ],
        [
            'id' => 3,
            'country' => 'Serbia',
            'city' => 'Belgrade',
            'zipCode' => '11000',
            'streetName' => 'Cvijiceva',
            'streetNumber' => 33
        ]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect($this->addresses)->each(function($address) {
            \App\Models\Address::factory()->create($address);
        });
    }
}
