<?php

namespace App\Http\Controllers;
use App\Models\Folwer;
use App\Models\Comment;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Storage;




class FolwerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Folwer::all();
        //  dd($data);
        return view ('folwer',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addfolwer');
        // return'oo';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $ob = new Folwer();
        // $ob->name_fol = $request['name_fol'];
        // $ob->detail_fol = $request['detail_fol'];
        // $ob->color = $request['color'];
        // $ob->price = $request['price'];
        // $ob->image_fol = $request['image_fol'];
        // $ob->save();
        // return redirect('/folwers');

        $request->validate([
            'name_fol' => 'required',
            'detail_fol' => 'required',
            'color' => 'required',
            'price' => 'required',
            'image_fol' => 'required',
            // 'image_fol' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // กำหนดข้อกำหนดสำหรับรูปภาพที่อัปโหลด
        ]);

        $ob = new Folwer();
        $ob->name_fol = $request['name_fol'];
        $ob->detail_fol = $request['detail_fol'];
        $ob->color = $request['color'];
        $ob->price = $request['price'];
        // $ob->image_fol = $request['image_fol'];

        // อัปโหลดรูปภาพไปยัง storage/app/public (ใช้ symbolic link ไปยัง public/storage)
        if ($request->hasFile('image_fol')) {
            $imagePath = $request->file('image_fol')->store('public/image_fol');
            $ob->image_fol = str_replace('public/', '', $imagePath);
        }
        
        $ob->save();
        return redirect('/folwers');

        
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
        $data = Folwer::find($id);
        return view ('editfolwer',compact('data'));
        // return'88';
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
        // $ob =Folwer::find($id);
        // $ob->name_fol = $request['name_fol'];
        // $ob->detail_fol = $request['detail_fol'];
        // $ob->color = $request['color'];
        // $ob->price = $request['price'];
        // $ob->image_fol = $request['image_fol'];
        // $ob->save();
        // return redirect('/folwers');

        $request->validate([
            'name_fol' => 'required',
            'detail_fol' => 'required',
            'color' => 'required',
            'price' => 'required',
            'image_fol' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // กำหนดข้อกำหนดสำหรับรูปภาพที่อัปเดต
        ]);

        $ob = Folwer::find($id);
        $ob->name_fol = $request['name_fol'];
        $ob->detail_fol = $request['detail_fol'];
        $ob->color = $request['color'];
        $ob->price = $request['price'];

        // ถ้ามีการอัปเดตรูปภาพ
        if ($request->hasFile('image_fol')) {
            if ($ob->image_fol) {
                Storage::delete('public/image_fol/' . $ob->image_fol);
            }
        
            $imagePath = $request->file('image_fol')->store('public/image_fol');
            $ob->image_fol = str_replace('public/', '', $imagePath);
        }
        

        $ob->save();
        return redirect('/folwers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        $obj = Folwer::find($id);
        $obj->delete();
        return redirect('/folwers');
    }
    public function detail($id)
    {
        $ob = Folwer::find($id);
        return view('detailflower',compact('ob'));
        // return '66';
    }
}
