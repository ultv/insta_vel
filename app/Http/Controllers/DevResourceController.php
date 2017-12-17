<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
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

        if (!auth()->id()) {
            session()->flash('error', 'Авторизуйтесь чтобы добавлять посты или комментарии');
        }

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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('photo');

        if ($file && $file->isValid()) {

            $filename = 'images' . DIRECTORY_SEPARATOR . uniqid('image_',
                    true) . '.' . $file->extension();

            //
            Storage::putFileAs('public', $file, $filename);

            $post = new Post();

            $post->user_id = auth()->id();
            $post->place = $request->post('place');

            $post->path = 'storage' . DIRECTORY_SEPARATOR . $filename;

            $post->saveOrFail();

            $request->session()->flash('success', 'Данные успешно сохранены');




        } else {

            $request->session()->flash('error', 'Данные не сохранены. Проблемы с файлом.');
        }

        return redirect()->route('content.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);

        return view('content.show')->withPost($post);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)


    {
        $post = Post::find($id);

        return view('content.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $file = $request->file('photo');

        if ($file && $file->isValid()) {

            $filename = 'images' . DIRECTORY_SEPARATOR . uniqid('image_',
                    true) . '.' . $file->extension();

            //
            Storage::putFileAs('public', $file, $filename);

            $post = Post::findOrFail($id);


            $post->place = $request->post('place');

            $post->path = 'storage' . DIRECTORY_SEPARATOR . $filename;

            $post->saveOrFail();

            $request->session()->flash('success', 'Данные обновлены');

        } else {

            $request->session()->flash('error', 'Данные не сохранены. Проблемы с файлом.');
        }


        return redirect()->route('content.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {

        // Сначала удаляем комменты

        $post = Post::findOrFail($id);

        $post->comments()->delete();

        if ($post->user_id == auth()->id()) {

            // до удаления поста удалим фото с сервера - не работает!!!

        //    return ($post->path); // test
            // $f = Storage::disk('public');
            // $f->delete($post->path);
            // if(Storage::delete($post->path))
                // Storage::delete('G:/1.txt');
                // и удалим пост
                $post->delete();
                $request->session()->flash('success', 'Данные успешно удалены.');

        } else {
            $request->session()->flash('error', 'Ошибка удаления.');
        }

        return redirect('/content');

    }


}






