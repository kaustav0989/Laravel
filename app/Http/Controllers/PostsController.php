<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use Session;
use Illuminate\Support\Facades\DB;
use Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index',['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        $tags      = Tag::all();
        if( count($category) == 0  || count($tags) == 0)
        {
            Session::flash('info','You must have categories and tags');
            return redirect()->back();
        }        
        return view('admin.posts.create')->with('category', $category)->with('tags',$tags) ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request,[
            'title'         => 'required',
            'featured'      => 'required|image',
            'content'       => 'required', 
            'category_id'   => 'required',
            'tags'          => 'required',
        ]);
        
        $featured           = $request->featured;
        $featured_new_name  = time().$featured->getClientOriginalName();

        $featured->move('upload/posts',$featured_new_name);

        $post   =  Post::create([
                   'title'       => $request->title,
                   'content'     => $request->content,
                   'category_id' => $request->category_id,
                   'featured'    => 'upload/posts/'.$featured_new_name,   
                   'slug'        => str_slug($request->title),
                   'user_id'     => Auth::user()->id
        ]);

        $post->tags()->attach($request->tags);

        Session::flash('success','Post created Successfully');
        return redirect()->route('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post       = Post::find($id);
        $category   = Category::all();
        return view('admin.posts.edit')->with('post',$post)->with('category',$category)->with('tags',Tag::all());
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
        $this->validate($request,[
            'title'         => 'required', 
            'content'       => 'required', 
            'category_id'   => 'required',
        ]);

        $post = Post::find($id);

        if( $request->hasFile('featured') )
        {
            $featured               = $request->featured;
            $featured_new_name      = time().$featured->getClientOriginalName();
            $featured->move('upload/posts',$featured_new_name);

            $post->featured         = 'upload/posts/'.$featured_new_name;
        }

        $post->title                = $request->title;
        $post->content              = $request->content;
        $post->category_id          = $request->category_id;

        $post->save();

        $post->tags()->sync($request->tags);//For updating the relevant tags

        Session::flash('success','post updated successfully');

        return redirect()->route('posts');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::find($id)
              ->delete();

        Session::flash('success','Post trashed successfully');
        
        return redirect()->back();        
    }

    public function trashed()
    {
        $posts = Post::onlyTrashed()->get();

        return view('admin.posts.trashed',['posts'=>$posts]);
    }

    public function kill($id)
    {
        $posts = Post::withTrashed()->where('id',$id)->first();
        $posts->forceDelete();
        @unlink($posts->featured);

        Session::flash('success','Post deleted permanently');

        return redirect()->route('post.trashed');
    }

    public function restore($id)
    {
        $posts = Post::withTrashed()->where('id',$id)->first();

        $posts->restore();

        Session::flash('success','Post restored permanently');

        return redirect()->route('posts');
    }
}
