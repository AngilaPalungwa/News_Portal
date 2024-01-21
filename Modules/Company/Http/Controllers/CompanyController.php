<?php

namespace Modules\Company\Http\Controllers;

use App\Models\Company;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $company=Company::first();
        return view('company::index',compact('company'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('company::create');
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
            'email'=>'required|email',
            'contact'=>'required',
            'address'=>'required',
        ]);
        if($request->has('logo')&&$request->file('logo')){
            $file=$request->file('logo');
            $newName=time() . $file->getCLientOriginalName();
            $path=public_path('/images/company');
            $file->move($path,$newName);
        }
        $data=[
            'name'=>$request->name,
            'email'=>$request->email,
            'address' => $request->address,
            'contact'=>$request->contact,
            'aboutus'=>$request->aboutus,
            'facebook'=>$request->facebook,
            'linkedin'=>$request->linkedin,
            'youtube'=>$request->youtube,
            'twitter'=>$request->twitter,
            'logo'=>$newName,
        ];
        Company::insert($data);

        $request->session()->flash('success','Company Added Successfully');
        return  redirect()->route('company.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('company::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        if(!$id){
            session()->flash('error', 'something went wrong');
            return redirect()->route('users.index');
        }
        $company=Company::find($id);
        return view('company::edit',compact('company'));
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
            'email'=>'required|email',
            'contact'=>'required',
            'address'=>'required',
        ]);
        if($request->has('logo')&&$request->file('logo')){
            $file=$request->file('logo');
            $newName=time() . $file->getCLientOriginalName();
            $path=public_path('/images/company');
            $file->move($path,$newName);
        }
        $data=[
            'name'=>$request->name,
            'email'=>$request->email,
            'contact'=>$request->contact,
            'address' => $request->address,
            'logo'=>$newName,
            'aboutus'=>$request->aboutus,
            'facebook'=>$request->facebook,
            'linkedin'=>$request->linkedin,
            'youtube'=>$request->youtube,
            'twitter'=>$request->twitter,
        ];
        $company=Company::find($id);
        $company->update($data);

        $request->session()->flash('success','Company Updated Successfully');
        return  redirect()->route('company.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        if(!$id){
            session()->flash('error', 'something went wrong');
            return redirect()->route('users.index');
        }
        $company=Company::find($id);
        if($company){
            $company->delete();
            session()->flash('success', 'Company Delete Successfully');
            return redirect()->route('company.index');
        }

        session()->flash('error', 'Something went Wrong!!');
        return redirect()->route('company.index');
    }
}
