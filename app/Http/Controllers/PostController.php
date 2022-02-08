<?php

namespace App\Http\Controllers;

use App\Events\PostCountEvent;
use App\Events\PostMessageEvent;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\CreatePostRequest;
use Illuminate\support\facades\Storage;
use Illuminate\Support\Facades\Gate;



class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index',compact('posts'));
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
    public function store(CreatePostRequest $request)
    {
        $post = new Post;
        if($request->file('Image'))
        {
           $file=$request->file('Image');
           $r=$file->store('public/Image');
           $name=Storage::url($r);
           $post->path=$name;
           //"/storage/yv6NbbdAYqOUmYKJC5oKBIK2b3A63rPXFVvq6uzv.jpg"
           //"/storage/Image/6ThcLFtQlkSrEOs3lm6vVkxj4eP2JzeXEPjGoXhH.jpg"
        }

//http://localhost:8000/storage/Image/c1MV0Zzo0kCz0kGLlatKj8Jpf5GKdm7ait2cK4y6.jpg
//http://localhost:8000/storage/Image/NyyUNFljhtxmhIELaSHTbx6S4t8Vn0gvLYH7eJeQ.jpg

//app public ----> DELEEETE
///storage/Image//storage/Image/5RnEU1e2Or72kbJOqEqABmT6fIkfAYLVt39yfRIf.jpg
        $post->name = $request->title;
        $post->body = $request->body;
        $post->user_id = 1;
        $post->save();
        message('پست با موفقیت ساخته شد','info');
        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        event(new PostCountEvent($post));
        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        // if(Gate::allows('edit_Post',$post))
        // {
        //    return view('posts.edit',compact('post'));
        // }
        // else
        // {
        //     return "You Dont Have Access";
        // }
        return view('posts.edit',compact('post'));

       // return  Storage::download('public/Image/YdyYLAzrc2ERsnNAw16vmHUwatvGbruXMUTdhLlT.jpg');
       // return  Storage::disk('public')->download('Image/YdyYLAzrc2ERsnNAw16vmHUwatvGbruXMUTdhLlT.jpg');
      //if(strpos($post->name,'B') or strpos($post->name,'M')){ return Storage::disk('mahi')->download('K5W3gYjUz0UBUhGDYIg19GWKD5mBs6GMoS8xjwF5.jpg');}
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Post $post)
    {
     //dd($_SERVER["REQUEST_METHOD"]);
     $post->update(['name'=>$request->title,'body'=>$request->body]);
     event(new PostMessageEvent($post));
     return redirect(route('post.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect(route('post.index'));
    }
}
