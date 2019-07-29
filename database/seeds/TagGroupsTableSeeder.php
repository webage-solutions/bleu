<?php

use Illuminate\Database\Seeder;

class TagGroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tag_groups')->insert([
            [
                'id' => 1,
                'user_id' => 1,
                'slug' => 'CATEGORIAS',
                'description' => 'Classificação por categorias'
            ],
            [
                'id' => 2,
                'user_id' => 1,
                'slug' => 'FAMILIA',
                'description' => 'Classificação por familiares'
            ],
        ]);
    }
}
