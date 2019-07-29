<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            [
                'id' => 1,
                'user_id' => 1,
                'tag_group_id' => 1,
                'parent_id' => null,
                'slug' => 'FIXAS',
                'description' => 'Despesas que ocorrem com o mesmo valor todos os meses (podem ser cortadas)'
            ], [
                'id' => 2,
                'user_id' => 1,
                'tag_group_id' => 1,
                'parent_id' => null,
                'slug' => 'VARIAVIES',
                'description' => 'Despesas que ocorrem com valores diferentes todos os meses (podem ser reduzidas)'
            ], [
                'id' => 3,
                'user_id' => 1,
                'tag_group_id' => 1,
                'parent_id' => null,
                'slug' => 'EXTRAS',
                'description' => 'Despesas que precisamos estar preparados para quando acontecerem'
            ], [
                'id' => 4,
                'user_id' => 1,
                'tag_group_id' => 1,
                'parent_id' => null,
                'slug' => 'ADICIONAIS',
                'description' => 'Despesas que não precisam ocorrer todos os meses.'
            ], [
                'id' => 5,
                'user_id' => 1,
                'tag_group_id' => 1,
                'parent_id' => 1,
                'slug' => 'HABITACAO',
                'description' => 'Despesas fixas com moradia'
            ], [
                'id' => 6,
                'user_id' => 1,
                'tag_group_id' => 1,
                'parent_id' => 5,
                'slug' => 'ALUGUEL',
                'description' => 'Aluguel mensal'
            ], [
                'id' => 7,
                'user_id' => 1,
                'tag_group_id' => 1,
                'parent_id' => 5,
                'slug' => 'CONDOMINIO',
                'description' => 'Condomínio mensal'
            ], [
                'id' => 8,
                'user_id' => 1,
                'tag_group_id' => 2,
                'parent_id' => null,
                'slug' => 'GERAL',
                'description' => 'Despesas compartilhadas'
            ], [
                'id' => 9,
                'user_id' => 1,
                'tag_group_id' => 2,
                'parent_id' => null,
                'slug' => 'JEFERSON',
                'description' => 'Despesas do Jeferson'
            ], [
                'id' => 10,
                'user_id' => 1,
                'tag_group_id' => 2,
                'parent_id' => null,
                'slug' => 'MICHELE',
                'description' => 'Despesas da Michele'
            ], [
                'id' => 11,
                'user_id' => 1,
                'tag_group_id' => 2,
                'parent_id' => null,
                'slug' => 'LUNA',
                'description' => 'Despesas da Luna'
            ], [
                'id' => 12,
                'user_id' => 1,
                'tag_group_id' => 2,
                'parent_id' => null,
                'slug' => 'ARTHUR',
                'description' => 'Despesas do Arthur'
            ],
        ]);
    }
}
