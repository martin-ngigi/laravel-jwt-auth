<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * GET ALL PRODUCTS
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Post::all();
    }

    /**
     * CREATING/POST a post
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // return Product::create([
        //     'title' => 'Post One',
        //     'description' => 'This is post 1 description',
        // ]);

        //validate
        $request-> validate([
            'title'=>'required',
            'description'=>'required',
        ]);

        return Post::create($request->all());

    }

    /**
     * GET -> get one post
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return Post::find($id);
    }

    /**
     * PUT
     * update post
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $post = Post::find($id);
        $post->update($request->all());
        return $post;
    }

    /**DELETE
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        return Post::destroy($id);
    }

    public function search($title){
        return Post::where('title','like','%'.$title)->get();
    }
}
