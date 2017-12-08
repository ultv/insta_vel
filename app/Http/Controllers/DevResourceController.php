<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;




class DevResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::orderby('created_at', 'desc')->paginate(10);
        return view('content.index')->withPost($post);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.create_post');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $file = $request->file( 'photo');

             if ($file && $file->isValid()) {

                $filename = 'images2' . DIRECTORY_SEPARATOR . uniqid('image_',
                       true) . '.' . $file->extension();

            // Manually specify a file name...
            Storage::putFileAs('public', $file, $filename);

            $post = new Post();

            $post->user_id = auth()->id();
            $post->place = $request->post('place');

            $post->path = 'storage' . DIRECTORY_SEPARATOR . $filename;

            $post->saveOrFail();

            $request->session()->flash('success', 'Данные успешно сохранены');

        } else
                {

                    $request->session()->flash('error', 'Данные не сохранены. Проблемы с файлом.');
                }

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
        $post = Posts::findOrFail($id);

        return view('content.show')->withPost($post);




    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)

    // видео посмотреть
    {
        $post = Post::find($id);
        // return view('content.edit')->withPost($post);

        return view('content.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update (Request $request, $id)
    {

        $file = $request->file( 'photo');

        if ($file && $file->isValid()) {

            $filename = 'images2' . DIRECTORY_SEPARATOR . uniqid('image_',
                    true) . '.' . $file->extension();

            // Manually specify a file name...
            Storage::putFileAs('public', $file, $filename);

            $post = Post::findOrFail($id);

        //    $post->user_id = auth()->id();
            $post->place = $request->post('place');

            $post->path = 'storage' . DIRECTORY_SEPARATOR . $filename;

            $post->saveOrFail();

            $request->session()->flash('success', 'Данные обновлены');

        } else
        {

            $request->session()->flash('error', 'Данные не сохранены. Проблемы с файлом.');
        }

        // return redirect()->route('content.show', $post->id);
        return redirect()->route('content.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        if ($post->user_id == auth()->id()) {
            $post->delete();
            $request->session()->flash('success', 'Данные успешно удалены.');
        } else {
           $request->session()->flash('error', 'Ошибка удаления.');
        }

        return redirect( '/content');

    }
}
