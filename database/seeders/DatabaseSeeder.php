<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Family;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $grandParent = Family::create([
            'name'      => 'Budi',
            'gender'    => 'male',
        ]);

        $parent1 = Family::create([
            'parent_id' => $grandParent->id,
            'name'      => 'Dedi',
            'gender'    => 'male'
        ]);

        Family::create([
            'parent_id'         => $parent1->id,
            'grand_parent_id'   => $grandParent->id,
            'name'              => 'Feri',
            'gender'            => 'male'
        ]); 

        Family::create([
            'parent_id'         => $parent1->id,
            'grand_parent_id'   => $grandParent->id,
            'name'              => 'Farah',
            'gender'            => 'female'
        ]); 

        $parent2 = Family::create([
            'parent_id' => $grandParent->id,
            'name'      => 'Dodi',
            'gender'    => 'male'
        ]);

        Family::create([
            'parent_id'         => $parent2->id,
            'grand_parent_id'   => $grandParent->id,
            'name'              => 'Gugus',
            'gender'            => 'male'
        ]); 

        Family::create([
            'parent_id'         => $parent2->id,
            'grand_parent_id'   => $grandParent->id,
            'name'              => 'Gandi',
            'gender'            => 'male'
        ]); 

        $parent3 = Family::create([
            'parent_id' => $grandParent->id,
            'name'      => 'Dede',
            'gender'    => 'male'
        ]);

        Family::create([
            'parent_id'         => $parent3->id,
            'grand_parent_id'   => $grandParent->id,
            'name'              => 'Hani',
            'gender'            => 'female'
        ]); 

        Family::create([
            'parent_id'         => $parent3->id,
            'grand_parent_id'   => $grandParent->id,
            'name'              => 'Hana',
            'gender'            => 'female'
        ]); 

        $parent4 = Family::create([
            'parent_id' => $grandParent->id,
            'name'      => 'Dewi',
            'gender'    => 'female'
        ]);
    }
}
