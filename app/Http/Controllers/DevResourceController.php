<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
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
        //
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

            $post = new Posts();

            $post->user_id = auth()->id();
            $post->place = $request->post('place');

            $post->path = 'storage' . DIRECTORY_SEPARATOR . $filename;

            $post->saveOrFail();

            $request->session()->flash('success', 'Данные успешно сохранены');

        } else
                {

                    $request->session()->flash('error', 'Данные не сохранены. Проблемы с файлом.');
                }

       // return view('content.show');
        return redirect()->route('content.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Posts::find($id);

        return view('content.show')->withPost($post);




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
        //
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
