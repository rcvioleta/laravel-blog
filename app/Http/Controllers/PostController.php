<?php

namespace App\Http\Controllers;

use App\Post;

use App\Category;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index')->with('posts', Post::all());
        // added comment
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        if ($categories->count() === 0) 
        {
            $message = 'You need to create a category first before creating a post';
            return redirect()->route('category.create')->with('info', $message);
        }

        return view('admin.posts.create')->with('categories', $categories);
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
            'title' => 'required|max:255',
            'featured' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'content' => 'required',
            'category_id' => 'required'
        ]);

        $featured = $request->featured;
        $featured_name = time().$featured->getClientOriginalName();
        $featured->move('uploads/posts', $featured_name);
    
        $post = Post::create([ 
            'title' => $request->title,
            'featured' => 'uploads/posts/' . $featured_name,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'slug' => str_slug($request->title)
        ]);

        return redirect()->route('post.create')->with('message', 'New post was added');
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
        return view('admin.posts.edit')->with('post', Post::find($id))->with('categories', Category::all());
        return dd(Post::find($id));
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
            'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => 'required'
        ]);

        $post = Post::find($id);

        if ($request->hasFile('featured')) 
        {
            $this->validate($request, [
                'featured' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);

            $featured = $request->featured;
            $featured_name = time().$featured->getClientOriginalName();
            $featured->move('uploads/posts', $featured_name);
            $post->featured = 'uploads/posts/' . $featured_name;
        }
    
        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        $post->slug = str_slug($request->title);

        $post->save();

        return redirect()->route('posts')->with('message', 'Post was updated');
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
        $post->delete();
        return redirect()->route('posts')->with('message', 'Post was moved to trashed successfully');
    }

    public function trashed()
    {
        $posts = Post::onlyTrashed()->get();
        return view('admin.posts.trashed')->with('posts', $posts);
    }

    public function delete($id) 
    {
        $post = Post::withTrashed()->where('id', $id)->first();
        $post->forceDelete();
        return redirect()->route('post.trashed')->with('message', 'Post was deleted permanently');
    }    

    public function restore($id) 
    {
        $post = Post::withTrashed()->where('id', $id)->first();
        $post->restore();
        return redirect()->route('post.trashed')->with('message', 'Post was restored');
    }
}
