<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class PostsController extends Controller
{

    /**
    * Get all posts in ordered position by ID
    *
    * @param \App\Post $post
    *
    * @return \Illuminate\Http\Response
    */

    public function getAllPosts(Post $post)
    {
      $posts = $post
                  ->orderBy(
                    'id', 'desc'
                    )
                  ->get();
      $result['status'] = 1;
      $result['msg'] = 'success';
      $result['posts'] = $posts;
      return $result;
    }

    /**
    * Grab a post from DB by id
    * and show it to user
    *
    * @param \App\Post $post
    * @param int $id
    *
    * @return \Illuminate\Http\Response
    */

    public function show(Post $post, $id)
    {
      $show = $post->find($id);
      $result['status'] = 1;
      $result['msg'] = 'success';
      $result['object'] = $show;
      return $result;
    }

    /**
    * Update data with sending requests
    *
    * @param \Illuminate\Http\Request $request
    * @param \App\Post $post
    *
    * @return \Illuminate\Http\Response
    */

    public function update(Request $request, Post $post)
    {
      $post->where(
        'id', $request->id
        )->update([
          'title' => $request->title,
          'desc' => $request->desc
        ]);
      $result['status'] = 1;
      $result['msg'] = 'success';
      return $result;
    }

    /**
    * Create a new post, title and description of a post
    *
    * @param \Illuminate\Http\Request $request
    * @param \App\Post $post
    *
    * @return \Illuminate\Http\Response
    */

    public function store(Request $request, Post $post)
    {
      $post->create([
        'title' => $request->title,
        'desc' => $request->desc
      ]);
      $result['status'] = 1;
      $result['msg'] = 'success';
      return $result;
    }

    /**
    * Delete post by request grabing an ID of a post
    *
    * @param \Illuminate\Http\Request $request
    * @param \App\Post $post
    *
    * @return \Illuminate\Http\Response
    */

    public function destroy(Request $request, Post $post)
    {
      $post
          ->find($request->id)
          ->delete();
      $result['status'] = 1;
      $result['msg'] = 'success';
      return $result;
    }


}
