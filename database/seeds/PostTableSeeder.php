<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post = new Post([
            'title' => 'Cat',
            'content' => 'Cat',
            'linkToImage' => 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fi.ytimg.com%2Fvi%2FOFjlF7zQF_g%2Fmaxresdefault.jpg'
        ]);
        $post->save();

        $post = new Post([
            'title' => 'Cat 2',
            'content' => 'Cat 2',
            'linkToImage' => 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fi.ytimg.com%2Fvi%2FOFjlF7zQF_g%2Fmaxresdefault.jpg'
        ]);
        $post->save();

        $post = new Post([
            'title' => 'Dog',
            'content' => 'Dog',
            'linkToImage' => 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.rover.com%2Fblog%2Fwp-content%2Fuploads%2F2016%2F02%2F16426960180_546bad2d8c_k.jpg'
        ]);
        $post->save();

        $post = new Post([
            'title' => 'Dog 2',
            'content' => 'Dog 2',
            'linkToImage' => 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fmedia.treehugger.com%2Fassets%2Fimages%2F2015%2F02%2Fdog-happy.jpg'
        ]);
        $post->save();

    }
}
