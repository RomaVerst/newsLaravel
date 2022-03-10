<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(
            [

                [
                    "title" => "Россия",
                    "slug" => "russia"
                ],
                [
                    "title" => "Мир",
                    "slug" => "world"
                ],
                [
                    "title" => "Бывший СССР",
                    "slug" => "ussr_in_past"
                ],
                [
                    "title" => "Экономика",
                    "slug" => "economic"
                ],
                [
                    "title" => "Силовые структуры",
                    "slug" => "police_and_army"
                ],
                [
                    "title" => "Наука и техника",
                    "slug" => "science_and_technology"
                ],
                [
                    "title" => "Культура",
                    "slug" => "culture"
                ],
                [
                    "title" => "Спорт",
                    "slug" => "sport"
                ],
                [
                    "title" => "Интернет и СМИ",
                    "slug" => "internet_and_media"
                ],
                [
                    "title" => "Ценности",
                    "slug" => "valuable_things"
                ],
                [
                    "title" => "Путешествия",
                    "slug" => "travels"
                ],
                [
                    "title" => "Из жизни",
                    "slug" => "life"
                ],
                [
                    "title" => "Дом",
                    "slug" => "my_home"
                ],
                [
                    "title" => "Люди",
                    "slug" => "people"
                ],
                [
                    "title" => "История",
                    "slug" => "history"
                ],
                [
                    "title" => "Явления",
                    "slug" => "facts"
                ],
                [
                    "title" => "Достижения",
                    "slug" => "achievements"
                ],
                [
                    "title" => "События",
                    "slug" => "events"
                ],
                [
                    "title" => "Экология",
                    "slug" => "ecology"
                ],
                [
                    "title" => "69-я параллель",
                    "slug" => "69_parallel"
                ],
                [
                    "title" => "Нацпроекты",
                    "slug" => "nation_project"
                ],
            ]
        );
    }
}
