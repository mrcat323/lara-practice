<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

use Carbon\Carbon;

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

    public function saveChanges(Request $request, Post $post)
    {
      $postId = $request->id;
      $postTitle = $request->title;
      $postDescription = $request->desc;
      $editPost = $post->find($postId);
      $editPost->title = $postTitle;
      $editPost->desc = $postDescription;
      $editPost->updated_at = Carbon::now();
      $editPost->save();
      $result['status'] = 1;
      $result['msg'] = 'success';
      return $result;
    }

    public function store(Request $request, Post $post)
    {
      $postTitle = $request->title;
      $postDescription = $request->desc;
      $post->title = $postTitle;
      $post->desc = $postDescription;
      $post->created_at = Carbon::now();
      $post->save();
      $result['status'] = 1;
      $result['msg'] = 'success';
      return $result;
    }

    public function delete(Request $request, Post $post)
    {
      $postId = $request->id;
      $postShouldBeDeleted = $post->find($postId);
      $postShouldBeDeleted->delete();
      $result['status'] = 1;
      $result['msg'] = 'success';
      return $result;
    }


}
