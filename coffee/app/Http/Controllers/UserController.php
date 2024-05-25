<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::all();
        return view ('user',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $ob = new User();
        // $ob->name = $request['name'];
        // $ob->email = $request['email'];
        // $ob->password = $request['password'];
        // $ob->status = $request['status'];
        // $ob->profile_image = $request['profile_image'];
        // $ob->save();
        // return redirect('/users');
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
        $data = User::find($id);
        return view ('edituser',compact('data'));
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
        $request->validate([
            'name' => 'required',
            'email' => ['required', 'email', Rule::unique('users')->ignore($id)],
            'status' => 'required',
            'profile_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->status = $request->input('status');
    
        if ($request->hasFile('profile_image')) {
            if ($user->profile_image) {
                Storage::delete('public/profile_image/' . $user->profile_image);
            }
    
            $imagePath = $request->file('profile_image')->store('public/profile_image');
            $user->profile_image = str_replace('public/', '', $imagePath);
        }
    
        $user->save();
    
        return redirect()->route('users.index')->with('success', 'ข้อมูลผู้ใช้งานถูกอัปเดตเรียบร้อยแล้ว');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obj = User::find($id);
        $obj->delete();
        return redirect('/users');
    }
}
