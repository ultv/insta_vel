<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class ComResController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $id = 2;
        return view('commit/commit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       // $file = $request->file( 'photo');

     //   if ($file && $file->isValid()) {

    //        $filename = 'images2' . DIRECTORY_SEPARATOR . uniqid('image_',
    //                true) . '.' . $file->extension();

            // Manually specify a file name...
    //        Storage::putFileAs('public', $file, $filename);

        $post = new Post(); //$post = Post::findOrFail($id);

        $comment = new Comment();

        $comment->author_id = auth()->id();

        //$post->user_id ==

        $comment->post_id = 3; //$post->id;
        $comment->text = $request->text;

      //      $post->user_id = auth()->id();
      //      $post->place = $request->post('place');

       //     $post->path = 'storage' . DIRECTORY_SEPARATOR . $filename;

        $comment->saveOrFail();
       //     $post->saveOrFail();

       //     $request->session()->flash('success', 'Данные успешно сохранены');

      //  } else
      //  {

      //      $request->session()->flash('error', 'Данные не сохранены. Проблемы с файлом.');
      //  }

        // return redirect()->route('content.show', $post->id);






        return redirect()->route('content.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $file = $request->file( 'photo');

        //   if ($file && $file->isValid()) {

        //        $filename = 'images2' . DIRECTORY_SEPARATOR . uniqid('image_',
        //                true) . '.' . $file->extension();

        // Manually specify a file name...
        //        Storage::putFileAs('public', $file, $filename);

        // $post = new Post();

        $post = Post::findOrFail($id);

        $comment = new Comment();

        $comment->author_id = auth()->id();

        //$post->user_id ==

        $comment->post_id = $post->id;
        $comment->text = $request->text;

        //      $post->user_id = auth()->id();
        //      $post->place = $request->post('place');

        //     $post->path = 'storage' . DIRECTORY_SEPARATOR . $filename;

        $comment->saveOrFail();
        //     $post->saveOrFail();

        //     $request->session()->flash('success', 'Данные успешно сохранены');

        //  } else
        //  {

        //      $request->session()->flash('error', 'Данные не сохранены. Проблемы с файлом.');
        //  }

        // return redirect()->route('content.show', $post->id);
        return redirect()->route('content.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
