<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Controllers\ApiController;

class PostController extends ApiController
{
    public function index()
    {
        $post = Post::get();
        return $this->Response($post,"List of posts");
    }

    public function store(StorePostRequest $request)
    {
        /* $post = new Post;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->save(); */

        $post = Post::create($request->validated());
        return $this->Response($post,"New Post Created!", 201);
    }

    public function show($id)
    {   
    $post = Post::find($id);
    if (!$post) {
        return $this->errorResponse("Post Not Found!");
    }

    return $this->Response($post, "Posts by $id", 201);
}


    public function update(UpdatePostRequest $request, $id)
    {
        /* $id->title = $request->title ?? $id->title; 
        $id->description = $request->description ?? $id->description; 
        $id->save(); */

        $post = Post::find($id);
        if (!$post) {
            return $this->errorResponse("Post Not Found!");
        }
        
        $post->update($request->validated());
        return $this->Response($post, "Post was updated!", 201);
    
    }

    public function destroy($id)
    {   $post = Post::find($id);
        if (!$post) {
            return $this->errorResponse("Post Not Found!");
        }
        $post->delete();
        return $this->Response(null,"Post was deleted!", 201);
    }
    
}
