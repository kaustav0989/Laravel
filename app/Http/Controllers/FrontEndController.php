<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Setting;

use App\Category;

use App\Post;

use App\Tag;

class FrontEndController extends Controller
{
    public function index()
    {
    	$title 		= Setting::first()
    							->site_name;
    	$category   = Category::take(3)
    							->get();
						
    	return view('index')
			->with('title',$title)
			->with('category',$category)
			->with('first_post',Post::orderBy('created_at','desc')->first())
			->with('second_post',Post::orderBy('created_at','desc')->skip(1)->take(1)->get()->first())
			->with('third_post',Post::orderBy('created_at','desc')->skip(2)->take(1)->get()->first())
			->with('html',Category::find(6))
			->with('spring',Category::find(7))
			->with('setting',Setting::first())
			->with('tags',Tag::all());
						
    }

    public function singlePost($slug)
    {
    	$post 		= Post::where('slug',$slug)
    							->first();

  		$next_id  	= Post::where('id','>',$post->id)->min('id');

  		$prev_id  	= Post::where('id','<',$post->id)->max('id');						

    	$category   = Category::take(3)
    							->get();						

    	return view('single')
    			->with('title',$post->title)
    			->with('post',$post)
    			->with('setting',Setting::first())
    			->with('category',$category)	
    			->with('prev',Post::find($prev_id))
    			->with('next',Post::find($next_id))
    			->with('tags',Tag::all());						
    }

    public function category($id)
    {
    	

    	$categories 	  = Category::find($id);

    	$category   = Category::take(3)
    							->get();
    	return view('category')
    			 ->with('category',$category)
    			 ->with('setting',Setting::first())
    			 ->with('categories',$categories)
    			 ->with('title',$categories->name);

    }

    public function tag($id)
    {
    	$tag = Tag::find($id);

    	$category   = Category::take(3)
    							->get();

    	return view('tag')
    			 ->with('tag',$tag)
    			 ->with('title',$tag->tag)
    			 ->with('category',$category)
    			 ->with('setting',Setting::first());

    }
}
