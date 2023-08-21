<?php

namespace App\Models;
namespace App\Http\Controllers;
use Illuminate\Support\Str;


use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $posts = POST::all();
        // return view('blog.index', compact('post'));
        ;
        return view('blog.index')->with('posts', POST::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $slug = Str::slug($request->title, '-');
        $newImageName = uniqid() . '-' . $slug . '.' .$request->image->extension();
        $request->image->move(public_path('images'), $newImageName);

        POST::create([
            'title' => $request->title,
            'description' => $request->description,
            'slug' => $slug,
            'image_path' => $newImageName,
            'user_id' => auth()->user()->id,
        ]);
        return redirect('/blog');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        return view('blog.show')
        ->with('post', POST::where('slug', $slug)->first());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        return view('blog.edit')
        ->with('post', POST::where('slug', $slug)->first());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:5048',
        ]);

        $newImageName = uniqid() . '-' . $slug . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $newImageName);

        POST::where('slug',$slug)
        ->update([
            'title' => $request->title,
            'description' => $request->description,
            'image_path' => $newImageName,
            'slug' => $slug,
            'user_id' => auth()->user()->id,
        ]);
        return redirect('/blog/' . $slug)
        ->with('message','تم التعديل على الموضوع');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        POST::where('slug',$slug)->delete();
            
        return redirect('/blog')
        ->with('message','تم حذف البوست بنجاح');
    }
}
