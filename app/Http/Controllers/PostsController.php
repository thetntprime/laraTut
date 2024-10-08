<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Laravel\Facades\Image;

use App\Models\Post;

class PostsController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $users = auth()->user()->following()->pluck('profiles.user_id');

        if (request()->has('search')){
            $posts = Post::where('caption','like', '%' . request()->get('search', '') . '%');
        }
        else{
            $posts = Post::whereIn('user_id', $users)->with('user')->latest();
        }

        $posts = $posts->paginate(5);

        return view('posts/index', compact('posts'));
    }

    public function create(){
        return view('posts/create');
    }

    public function store(){
        $data = request()->validate([
            'caption' => 'required',
            'image' => ['required', 'image'],
        ]);

        $imagePath = request('image')->store('uploads', 'public');

        $image = Image::read(public_path("storage/{$imagePath}"))->cover(1200, 1200);
        $image->save();

        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath,
        ]);

        return redirect('/profile/' . auth()->user()->id);
    }

    public function show(\App\Models\Post $post){

        $follows = (auth()->user()) ? auth()->user()->following->contains($post->user->id) : false;

        return view('posts.show', compact('post', 'follows'));
    }
}
