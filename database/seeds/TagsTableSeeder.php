<?php

use Illuminate\Database\Seeder;
use App\Tag;
class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tag = new Tag([
            'name' => 'Normal',
        ]);
        $tag->save();

        $tag = new Tag([
            'name' => 'High',
        ]);
        $tag->save();

        $tag = new Tag([
            'name' => 'Low',
        ]);
        $tag->save();
    }
}
