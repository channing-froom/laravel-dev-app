<?php

use Illuminate\Database\Seeder;

class TaxonomyTableSeeder extends Seeder
{
    protected $taxonomies = [
         [
             'id' => 1,
             'label' => 'Categories',
             'parent_id' => null,
         ],
        [
            'id' => 2,
            'label' => 'Cars',
            'parent_id' => '1',
        ],
        [
            'id' => 3,
            'label' => 'Homes',
            'parent_id' => '1',
        ],
    ];


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->taxonomies as $taxonomy) {
            DB::table('taxonomy')->insert([
                'id' => $taxonomy['id'],
                'label' => $taxonomy['label'],
                'slug' => str_slug($taxonomy['label']),
                'parent_id' => $taxonomy['parent_id'],
            ]);
        }
    }
}
