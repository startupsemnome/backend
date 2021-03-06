<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('UserTableSeeder');
        $this->call('CompanyTableSeeder');
        $this->call('ProblemTableSeeder');
        $this->call('ResourceTableSeeder');
        $this->call('CategoryTableSeeder');
        $this->call('ResourceProblemTableSeeder');    
        $this->call('CategoryResourceSeeder');
        $this->call('CategoryProblemSeeder');
        $this->call('DisponibilidadeTableSeeder');
    }
}
