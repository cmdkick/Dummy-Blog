<?php

namespace app;

class Blog
{
    private $posts;

    function __construct($post) 
    {
        $this->posts = $post;
    }

    public function getBlog() 
    {
        return $this->posts;
    }
}