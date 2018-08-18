<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class PostsController extends Controller
{


    public function getAllPosts(Post $post)
    {
      $posts = $post->all();
      $result['status'] = 1;
      $result['msg'] = 'success';
      $result['posts'] = $posts;
      return $result;
    }

    public function singlePostShow(Post $post, $id)
    {
      $singlePost = $post->find($id);
      $result['status'] = 1;
      $result['msg'] = 'success';
      $result['object'] = $singlePost;
      return $result;
    }


}
