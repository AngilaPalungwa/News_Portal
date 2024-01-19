<?php

namespace Modules\Ads\Http\Controllers;

use App\Models\Ads;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $ads=Ads::all();
        return view('ads::index',compact('ads'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('ads::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'company'=>'required',
            'ads_category'=>'required',
            'link'=>'required',
            'image'=>'required',
        ]);
        if($request->has('image') && $request->file('image')){
            $file = $request->file('image');
            $newName =  time().'.'.$file->getClientOriginalExtension();
            $path =  public_path('/ads');
            $file->move($path,$newName);
        }
        $data=[
            'company'=>$request->company,
            'ads_category'=>$request->ads_category,
            'link'=>$request->link,
            'slug'=>Str::slug($request->company),
            'image'=>$newName,
        ];
        Ads::insert($data);

        $request->session()->flash('success','Ads Added Successfully');
        return  redirect()->route('ads.index');

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('ads::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        if(!$id){
            session('error','somthing is Wrong');
            return  redirect()->route('ads.index');
        }
        $ad=Ads::find($id);
        return view('ads::edit',compact('ad'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        if(!$id){
            session('error','somthing is Wrong');
            return  redirect()->route('ads.index');
        }
        $ad=Ads::find($id);
        if($ad){
            $request->validate([
                'company'=>'required',
                'ads_category'=>'required',
                'link'=>'required',
                'image'=>'required',
            ]);
            if($request->has('image') && $request->file('image')){
                $file = $request->file('image');
                $newName =  time().'.'.$file->getClientOriginalExtension();
                $path =  public_path('/ads');
                $file->move($path,$newName);
            }
            $data=[
                'company'=>$request->company,
                'ads_category'=>$request->ads_category,
                'link'=>$request->link,
                'slug'=>Str::slug($request->company),
                'image'=>$newName,
            ];
            $ad->update($data);
            $request->session()->flash('success','Ads Updated Successfully');
            return  redirect()->route('ads.index');
        }


        $request->session()->flash('error','Something went wrong');
        return  redirect()->route('ads.index');

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        if(!$id){
            session('error','somthing is Wrong');
            return  redirect()->route('ads.index');
        }
        $ad=Ads::find($id);
        $ad->delete();
        session()->flash('success','Ads Deleted Successfully');
        return  redirect()->route('ads.index');
    }
}
