<?php

use Illuminate\Database\Seeder;
use App\Specialty;
use App\User;

class SpecialtiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $specialties = [
            'Oftalmología',
            'Pediatría',
            'Neurología'
        ];

        foreach ($specialties as $specialty) {
            $specialty = Specialty::create([
                'name' => $specialty
            ]);
            
            $specialty->users()->save(
                factory(User::class)->states('doctor')->make()
            );
        }

        User::find(3)->specialties()->save($specialty);
    }
}
