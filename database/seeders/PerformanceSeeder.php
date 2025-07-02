<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PerformanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $performances = [
            [
                'title' => 'De Notenkraker',
                'description' => 'Een klassiek ballet in twee bedrijven met muziek van Tsjaikovski.',
                'date' => now()->addDays(7)->toDateString(),
                'time' => '19:30:00',
                'duration' => 120,
                'price' => 45.00,
                'max_capacity' => 200,
                'is_active' => true,
            ],
            [
                'title' => 'Romeo en Julia',
                'description' => 'Een romantisch drama van William Shakespeare.',
                'date' => now()->addDays(14)->toDateString(),
                'time' => '20:00:00',
                'duration' => 150,
                'price' => 38.50,
                'max_capacity' => 180,
                'is_active' => true,
            ],
            [
                'title' => 'Muzikale Cabaret Avond',
                'description' => 'Een gezellige avond vol Nederlandse liedjes en cabaret.',
                'date' => now()->addDays(21)->toDateString(),
                'time' => '20:30:00',
                'duration' => 90,
                'price' => 25.00,
                'max_capacity' => 150,
                'is_active' => true,
            ],
            [
                'title' => 'Kinderconcert: Dierenorkest',
                'description' => 'Een leuk concert speciaal voor kinderen van 4-12 jaar.',
                'date' => now()->addDays(10)->toDateString(),
                'time' => '14:00:00',
                'duration' => 60,
                'price' => 12.50,
                'max_capacity' => 100,
                'is_active' => true,
            ],
            [
                'title' => 'Jazz in de Zaal',
                'description' => 'Een intieme jazzavond met lokale muzikanten.',
                'date' => now()->addDays(28)->toDateString(),
                'time' => '21:00:00',
                'duration' => 100,
                'price' => 32.00,
                'max_capacity' => 80,
                'is_active' => true,
            ],
        ];

        foreach ($performances as $performance) {
            \App\Models\Performance::create($performance);
        }
    }
}
