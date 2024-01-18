<?php

namespace Modules\Login\Http\Controllers;

use App\Mail\RegisterMail;
use App\Models\User;
use App\Models\UserDetails;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('login::register');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('login::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' =>'required|min:6',
            'address' => 'required',
            'phone' => 'required',
        ]);
        DB::beginTransaction();

        $userData = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ];
        $user_id = User::insertGetId($userData);

        if ($user_id) {
            $userDetailData = [
                'user_id' => $user_id,
                'phone' => $request->phone,
                'address' => $request->address,
            ];
            $status=UserDetails::insert($userDetailData);
            if($status){
                Mail::to($request->email)->send(new RegisterMail($request->name));
                DB::commit();
            }
        }
        $request->session()->flash('Success', 'User Registered successfully');
        return redirect()->route('login');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('login::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('login::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
