<?php

namespace Modules\AdminUser\Http\Controllers;

use App\Mail\PasswordResetMail;
use App\Models\User;
use App\Models\UserDetails;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $search=$request->search;
        if($search){
            $query=User::query()->where('name','LIKE','%'.$search.'%')
                                ->orWhere('email','LIKE','%'.$search.'%');
            $data['users']=$query->get();
            return view('adminuser::index',$data);
        }
        $users = User::with('userDetail')->get();
        return view('adminuser::index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('adminuser::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
        ]);
        $userData = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ];
        $user_id = User::insertGetId($userData);
        $image = '';
        if ($request->has('image') && $request->file('image')) {
            $file = $request->file('image');
            $newName=time() .'.'. $file->getClientOriginalExtension();
            $path = public_path('images/');
            $file->move($path, $newName);
            $image = $newName;
        }

        if ($user_id) {
            $userDetailData = [
                'user_id' => $user_id,
                'phone' => $request->phone,
                'address' => $request->address,
                'image' => $image,
            ];
            UserDetails::insert($userDetailData);
        }
        $request->session()->flash('Success', 'User created successfully');
        return redirect()->route('user.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public  function  reset(Request  $request)
    {
       $id =  $request->id;
       $password =  $request->password;
        try {
            if(!$id || !$password){
                $request->session()->flash('error','Something went wrong');
                return redirect()->route('user.index');
            }

            $user = User::find($id);
            if($user){
                $user->update(['password' => bcrypt($password)]);
                Mail::to($user->email)->send
                (new PasswordResetMail($password));
                $request->session()->flash('success','Password Reset Successfull');
                return redirect()->route('user.index');
            }

            $request->session()->flash('error','User Not found');
            return redirect()->route('user.index');
        }catch (\Exception $exception){
            dd($exception);
        }

    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        if (!$id) {
            session()->flash('error', 'something went wrong');
            return redirect()->route('users.index');
        }
        $data['user'] = User::with('userDetail')->find($id);
        return view('adminuser::edit', $data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        if (!$id) {
            session()->flash('error', 'something went wrong');
            return redirect()->route('users.index');
        }
        $user = User::with('userDetail')->find($id);
        if($user){
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
            ]);
            $userData = [
                'name' => $request->name,
                'email' => $request->email,
            ];
            $user->update($userData);
            if ($request->has('image') && $request->file('image')) {
                $file = $request->file('image');
                $newName=time() .'.'. $file->getClientOriginalExtension();
                $path = public_path('images/');
                $file->move($path, $newName);
            }
            $userDetailData = [
                'user_id' =>$id,
                'phone' => $request->phone,
                'address' => $request->address,
                'image' => $newName,
            ];
            UserDetails::where('user_id', $id)->update($userDetailData);
            $request->session()->flash('Success', 'User Updated successfully');
            return redirect()->route('user.index');
        }
        session()->flash('error', 'something went wrong');
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        if (!$id) {
            session()->flash('error', 'Something went Wrong!!');
            return redirect()->route('user.index');
        }

        $user = User::find($id);
        if ($user) {
            $user->delete();
            session()->flash('success', 'User Delete Successfully');
            return redirect()->route('user.index');
        }

        session()->flash('error', 'Something went Wrong!!');
        return redirect()->route('user.index');
    }

}
