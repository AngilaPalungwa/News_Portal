<?php

namespace Modules\Category\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Routing\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $query=Category::query();
        $searchTerm=$request->search;
        if($searchTerm){
            $query->where('name','LIKE','%'.$searchTerm.'%');
            $data['categories']=$query->get();
            return view('category::index',$data);
        }
        $categories=Category::latest()->paginate(10);
        return view('category::index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('category::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
        ]);
        $data=[
            'name'=>$request->name,
            'slug'=>Str::slug($request->name),
            'status'=>(!empty($request->status))?'1':'0',
        ];
        Category::insert($data);
        session()->flash('Success','Category Added Successfully');
        return redirect()->route('category.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('category::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        if(!$id){
            session()->flash('error','Something went wrong');
            return redirect(route('category.index'));
        }
        $category=Category::find($id);
        return view('category::edit',compact('category'));
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
            'name'=>'required',
        ]);
        $category=Category::find($id);
        if($category){

            $data=[
                'name'=>$request->name,
                'slug'=>Str::slug($request->name),
                'status'=>(!empty($request->status))?'1':'0',
            ];
            $category->update($data);
            session()->flash('Success','Category Added Successfully');
            return redirect()->route('category.index');
        }
        else{
            session()->flash('error','Something is wrong');
            return redirect()->route('category.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        if(!$id){
            session()->flash('error','Something went wrong');
            return redirect(route('category.index'));
        }
        $category=Category::find($id);
        $category->delete();
        session()->flash('success','Category deleted successfully');

        return redirect()->route('category.index');
    }
}
