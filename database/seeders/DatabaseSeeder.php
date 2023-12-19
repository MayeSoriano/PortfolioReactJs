<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subjects;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        $subj =[
            [
                'sub_title'=>'ITELECT 4100',
                'sub_room'=>'comlab 101',
            ],
        ];
        foreach($subj as $key => $sub){
            Subjects::create($sub);
        }
    }
}
