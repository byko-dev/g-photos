<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    /* show all posts */
    public function index(){
        $posts = Posts::with('user')->orderBy('id', 'desc')->paginate(3);

        return view('welcome', ['posts' => $posts]);
    }

    /* show create post form */
    public function create(){
        return view('post.add');
    }

    /* show edit post form or just single post */
    public function edit(Posts $posts){
        $posts['user'] = $posts->user()->get()[0];
        return view('post.edit', ['post' => $posts]);
    }

    /* save created post */
    public function store(Request $request){
        $formData = $request->validate([
            'description' => ['required', 'min:3'],
            'tags' => 'required',
            'photo' => 'required'
        ]);

        $formData['photo'] = $request->file('photo')->store('images', 'public');
        $formData['user_id'] = auth()->user()->id;

        Posts::create($formData);

        return redirect('/user');
    }

    /* increment like to post */
    public function incrementLikes(Posts $posts){
        $posts->likes = ++$posts->likes;
        $posts->update();
    }

    /* update post data */
    public function update(Request $request, Posts $posts){
        /*Make sure logged in user is owner */
        if($posts->user_id != auth()->id()){
            abort(403, 'Unauthorized Action');
        }

        $formData = $request->validate([
           'description' => 'required',
           'tags' => 'required'
        ]);

        $posts->update($formData);

        return redirect('/user')->with('message', "Post updated successfully!");
    }

    /* delete post */
    public function delete(Posts $posts){
        /*Make sure logged in user is owner */
        if($posts->user_id != auth()->id()){
            abort(403, 'Unauthorized Action');
        }

        if($posts->photo && Storage::disk('public')->exists($posts->photo)) {
            Storage::disk('public')->delete($posts->photo);
        }

        $posts->delete();

        return redirect('/user')->with('message', "Post deleted successfully!");
    }
}
