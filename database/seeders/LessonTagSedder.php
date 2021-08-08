<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LessonTagSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\LessonTag::Factory()->count(500)->create();
    }
}
