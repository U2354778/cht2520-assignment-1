<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;
use Carbon\Carbon;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events = [
            [
                'title' => 'Community Garden Cleanup Day',
                'description' => 'Join us for a day of gardening and community building. We\'ll be cleaning up the local community garden, planting new flowers, and sharing gardening tips. All ages welcome!',
                'event_date' => Carbon::now()->addDays(7),
                'event_time' => '09:00:00',
                'location' => 'Huddersfield Community Garden, St. Peter\'s Street',
                'organizer' => 'Huddersfield Garden Club',
                'capacity' => 30,
                'current_attendees' => 15,
                'status' => 'upcoming'
            ],
            [
                'title' => 'Local Art Exhibition',
                'description' => 'An exhibition showcasing the work of local artists from Huddersfield. Features paintings, sculptures, and digital art. Free entry with refreshments provided.',
                'event_date' => Carbon::now()->addDays(14),
                'event_time' => '18:00:00',
                'location' => 'Huddersfield Art Gallery, Byram Street',
                'organizer' => 'Huddersfield Arts Council',
                'capacity' => 50,
                'current_attendees' => 25,
                'status' => 'upcoming'
            ],
            [
                'title' => 'Neighborhood Book Club',
                'description' => 'Monthly book club meeting discussing "The Midnight Library" by Matt Haig. New members always welcome. Tea and biscuits provided.',
                'event_date' => Carbon::now()->addDays(3),
                'event_time' => '19:30:00',
                'location' => 'Huddersfield Library, Princess Alexandra Walk',
                'organizer' => 'Huddersfield Book Club',
                'capacity' => 20,
                'current_attendees' => 12,
                'status' => 'upcoming'
            ],
            [
                'title' => 'Local Market Day',
                'description' => 'Weekly local market featuring fresh produce, handmade crafts, and local businesses. Support local vendors and enjoy live music.',
                'event_date' => Carbon::now()->addDays(2),
                'event_time' => '10:00:00',
                'location' => 'Huddersfield Market Square',
                'organizer' => 'Huddersfield Market Association',
                'capacity' => 0,
                'current_attendees' => 0,
                'status' => 'upcoming'
            ],
            [
                'title' => 'Youth Football Tournament',
                'description' => 'Annual youth football tournament for ages 12-16. Teams from local schools compete for the championship trophy. Spectators welcome.',
                'event_date' => Carbon::now()->addDays(21),
                'event_time' => '14:00:00',
                'location' => 'Huddersfield Sports Complex, Leeds Road',
                'organizer' => 'Huddersfield Youth Sports League',
                'capacity' => 100,
                'current_attendees' => 45,
                'status' => 'upcoming'
            ],
            [
                'title' => 'Community Choir Performance',
                'description' => 'The Huddersfield Community Choir presents their spring concert featuring classical and contemporary pieces. Tickets available at the door.',
                'event_date' => Carbon::now()->addDays(10),
                'event_time' => '20:00:00',
                'location' => 'Huddersfield Town Hall, Corporation Street',
                'organizer' => 'Huddersfield Community Choir',
                'capacity' => 200,
                'current_attendees' => 150,
                'status' => 'upcoming'
            ],
            [
                'title' => 'Local History Walk',
                'description' => 'Guided walking tour of Huddersfield\'s historic landmarks and buildings. Learn about the town\'s industrial heritage and architectural gems.',
                'event_date' => Carbon::now()->addDays(5),
                'event_time' => '11:00:00',
                'location' => 'Meeting at Huddersfield Railway Station',
                'organizer' => 'Huddersfield Historical Society',
                'capacity' => 25,
                'current_attendees' => 18,
                'status' => 'upcoming'
            ],
            [
                'title' => 'Tech Workshop for Seniors',
                'description' => 'Free workshop teaching seniors how to use smartphones, tablets, and social media. Patient instructors and refreshments provided.',
                'event_date' => Carbon::now()->addDays(12),
                'event_time' => '13:00:00',
                'location' => 'Huddersfield Community Centre, New Street',
                'organizer' => 'Huddersfield Digital Inclusion Project',
                'capacity' => 15,
                'current_attendees' => 8,
                'status' => 'upcoming'
            ]
        ];

        foreach ($events as $event) {
            Event::create($event);
        }
    }
}
