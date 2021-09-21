<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProjectType;

class ProjectTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProjectType::create([
            'type' => 'Accompagnement'
        ]);

        ProjectType::create([
            'type' => 'Backlinks'
        ]);

        ProjectType::create([
            'type' => 'PBN'
        ]);
    }
}
