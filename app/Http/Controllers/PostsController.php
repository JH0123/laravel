<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'company' => 'required', 'car_name' => 'required', 'year' => 'required', 'pay' => 'required',
            'view' => 'required', 'kinds' => 'required'
        ]);

        $fileName = null;
        if ($request->hasFile('image')) {
            // dd($request->file('image'));

            $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('public/images', $fileName);
            // dd($path);
        }

        $input = array_merge($request->all(), ["user_id" => Auth::user()->id]);
        // dd($input);

        if ($fileName) {
            $input = array_merge($input, ['image' => $fileName]);
        }
        Post::create($input);

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit', ['post' => $post]);
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
        $this->validate($request, [
            'company' => 'required', 'car_name' => 'required', 'year' => 'required', 'pay' => 'required',
            'view' => 'required', 'kinds' => 'required'
        ]);
        $post = Post::find($id);
        $post->company = $request->company;
        $post->car_name = $request->car_name;
        $post->year = $request->year;
        $post->pay = $request->pay;
        $post->view = $request->view;
        $post->kinds = $request->kinds;

        if ($request->hasFile('image')) {
            if ($post->image) {
                Storage::delete('/storage/images' . $post->image);
            }
            $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
            $post->image = $fileName;
            $request->image->storeAs('public/images', $fileName);
        }

        $post->save();

        return redirect()->route('posts.show', ['post' => $post->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if ($post->image) {
            Storage::delete('public/images/' . $post->image);
        }
        $post->delete();
        return redirect()->route('posts.index');
    }

    public function deleteImage($id)
    {
        $post = Post::find($id);
        Storage::delete('public/images/' . $post->image);
        $post->image = null;
        $post->save();

        return redirect()->route('posts.edit', ['post' => $post->id]);
    }
}
