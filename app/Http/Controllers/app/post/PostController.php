<?php

namespace App\Http\Controllers\app\post;



use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $post =Post::find($id);
        $categories = Category::all();
        $posts_footer = Post::latest('created_at')->Limit(5)->get();
        $comments=Comment::where('post_id', $post->id)->get();
        return view('app.post.show', compact(['post', 'categories', 'posts_footer','comments']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function addComment(string $id ,Request $request)
    {

        $request->validate([
            'body' => 'required|max:2000'
        ]);
        
        $comment=new Comment;
        $comment->user_id=Auth::user()->id;
        $comment->post_id=$id;
        $comment->body=str_replace(PHP_EOL, '<br/>', $request->body);
        $comment->save();
        return back()->with(['success' => ' دیدگاه شما برای این محصول ثبت شد']);

        
    }
}
