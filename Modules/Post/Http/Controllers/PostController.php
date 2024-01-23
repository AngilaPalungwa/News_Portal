<?php

namespace Modules\Post\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $search=$request->search;
        if($search){
            $query=Post::query()->where('title','LIKE','%'.$search.'%')
                                ->orWhere('description','LIKE','%'.$search.'%');
            $data['posts']=$query->get();
            return view('post::index',$data);
        }
        $posts=Post::latest()->paginate(12);
        return view('post::index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $categories=Category::all();
        return view('post::create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'image'=>'required',
        ]);
        $post=new Post();
        $post->title=$request->title;
        $post->sub_title=$request->sub_title;
        $post->description=$request->description;
        $post->slug=Str::slug($request->title);
        if($request->hasFile('image'))
        {
            $file=$request->image;
            $newname=time() . $file->getCLientOriginalName();
            $file->move("images",$newname);
            $post->image="images/$newname";
        }
        $post->save();
        $request->session()->flash('success','Post Added Successfully');
        $post->categories()->attach($request->category_id);
        return  redirect()->route('post.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('post::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        if(!$id){
            session()->flash('error','Something is wrong');
            return redirect()->route('post.index');
        }
        $post=Post::find($id);
        $categories=Category::all();
        return view('post::edit',compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'image'=>'required',
        ]);
        $post=Post::find($id);
        $post->title=$request->title;
        $post->sub_title=$request->sub_title;
        $post->description=$request->description;
        $post->slug=Str::slug($request->title);
        if($request->hasFile('image'))
        {
            $file=$request->image;
            $newname=time() . $file->getCLientOriginalName();
            $file->move("images",$newname);
            $post->image="images/$newname";
        }
        $post->update();
        $request->session()->flash('success','Post Updated Successfully');
        $post->categories()->sync($request->category_id);
        return  redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        if(!$id){
            session()->flash('error','Something is wrong');
            return redirect()->route('post.index');
        }
        $post=Post::find($id);
        $post->categories()->detach();
        $post->delete();
        session()->flash('success','Post Deleted Successfully');
        return  redirect()->route('post.index');
    }
}
