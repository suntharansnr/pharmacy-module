<?php

namespace Database\Seeders;

use App\Models\Slot;
use DateInterval;
use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SlotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $startTime =  "8:00 AM";
        $endTime =  "4:00 PM";
        $slotLength = 2;
        $start = new DateTime($startTime);
        $end = new DateTime($endTime);
        $interval = new DateInterval('PT' . $slotLength . 'H');
        $slots = array();
        while ($start < $end) {
            $slots[] = $start->format('h:i A') . ' - ' . $start->add($interval)->format('h:i A');
        }

        foreach($slots as $key => $slot) {
            Slot::create(
                [
                    'name' => $slot
                ]
            );
        }
    }
}
