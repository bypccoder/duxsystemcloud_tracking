<?php

namespace Database\Seeders;

use App\Models\TimeRange;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TimeRangeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TimeRange::create(['description' => 'DE 9:00 HRS. A 10:00 HRS.', 'created_by' => 1, 'updated_by' => 1]);
        TimeRange::create(['description' => 'DE 10:00 HRS. A 11:00 HRS.', 'created_by' => 1, 'updated_by' => 1]);
        TimeRange::create(['description' => 'DE 12:00 HRS. A 13:00 HRS.', 'created_by' => 1, 'updated_by' => 1]);
        TimeRange::create(['description' => 'DE 14:00 HRS. A 15:00 HRS.', 'created_by' => 1, 'updated_by' => 1]);
        TimeRange::create(['description' => 'DE 16:00 HRS. A 17:00 HRS.', 'created_by' => 1, 'updated_by' => 1]);
        TimeRange::create(['description' => 'DE 17:00 HRS. A 18:00 HRS.', 'created_by' => 1, 'updated_by' => 1]);

    }
}
