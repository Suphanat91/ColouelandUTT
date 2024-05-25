<?php

namespace App\Http\Controllers;
use App\Models\ImageQr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ImageQrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = ImageQr::all();
        return view('imageQR', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // ตรวจสอบว่าเป็นไฟล์รูปภาพที่ถูกต้อง
        ]);
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->storeAs('public/imagesQR', $imageName); // บันทึกไฟล์รูปภาพใน storage
            $path = 'storage/imagesQR/'.$imageName;
    
            // บันทึก path ลงในฐานข้อมูล
            $newImage = new ImageQr;
            $newImage->path = $path;
            $newImage->save();
            return redirect('/imageQR');
            // return redirect()->route('imageQR')->with('success', 'Image uploaded successfully.');
        }
    
        return redirect()->back()->with('error', 'Failed to upload image.');
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
        $image = ImageQr::find($id);
        return view('edit', compact('image'));
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
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // ตรวจสอบว่าเป็นไฟล์รูปภาพที่ถูกต้อง
        ]);
    
        $image = ImageQr::find($id);
    
        if ($request->hasFile('image')) {
            // ลบรูปภาพเก่า (หากมี)
            Storage::delete($image->path);
    
            // อัพโหลดรูปภาพใหม่
            $newImage = $request->file('image');
            $imageName = time().'.'.$newImage->getClientOriginalExtension();
            $newImage->storeAs('public/imagesQR', $imageName);
            $path = 'storage/imagesQR/'.$imageName;
    
            // อัพเดต path ใหม่
            $image->path = $path;
        }
    
        $image->save();
    
        return redirect('/imageQR');
        // return redirect()->route('imageQR')->with('success', 'Image updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
