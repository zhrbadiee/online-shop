<?php

namespace App\Http\Controllers\admin\post;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $mime_image = $request->image->extension();
        $name_image = now() . '.' . $mime_image;
        $image = $request->image->move(public_path('admin-assets/post_image'), $name_image);
        $post = new Post;
        $post->name = $request->name;
        $post->type = $request->type;
        $post->price =convertPersianToEnglish($request->price); 
        $post->image = $name_image;
        $post->size = $request->size;
        $post->marketable_number =convertPersianToEnglish($request->marketable_number);
        $post->category_id = $request->category_id;
        $post->detail = $request->detail;
        $post->user_id = auth()->user()->id;
        $post->save();

       return redirect()->route('admin.post.index')->with(['success' => ' پست جدید با موفقیت ایجاد شد']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        return view('admin.post.edit', compact(['post', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, string $id)
    {
        if ($request->image != null) {
            $mime_image = $request->image->extension();
            $name_image = now() . '.' . $mime_image;
            $image = $request->image->move(public_path('admin-assets/post_image'), $name_image);
        }
        $post = Post::find($id);
        $post->name = $request->name;
        $post->type = $request->type;
        $post->price =convertPersianToEnglish($request->price); 
        if ($request->image != null) {
            $post->image = $name_image;
        }
        $post->size = $request->size;
        $post->marketable_number =convertPersianToEnglish($request->marketable_number);
        $post->category_id = $request->category_id;
        $post->detail = $request->detail;
        $post->user_id = auth()->user()->id;
        $post->save();

        return redirect()->route('admin.post.index')->with(['success' => ' پست مورد نظر شما با موفقیت ویرایش شد']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect()->route('admin.post.index')->with(['success' => 'پست  مورد نظر شما با موفقیت حذف شد']);
    }


    public function changeStatus(string $id)
    {
        $post=Post::find($id);
        if ($post->status=='enable') 
        {
            $post->status='disable';
            $post->save();
            return redirect()->back();
        }
        if ($post->status=='disable') 
        {
            $post->status='enable';
            $post->save();
            return redirect()->back();
        }
    }
}
