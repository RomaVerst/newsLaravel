<?php

use Illuminate\Database\Seeder;
use DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert($this->getData());
    }
    private function getData(){
        $data = [];
        $faker = Faker\Factory::create('ru_RU');
        for($i=0; $i<20; $i++){
            $data[]= [
                'title' => $faker->realText(rand(10, 20)),
                'text' => $faker->realText(rand(1000, 3000)),
                'isprivate' => (bool)rand(0,1),
                'category_id' => rand(1, 3)
            ];
        }
        return $data;
    }
}
