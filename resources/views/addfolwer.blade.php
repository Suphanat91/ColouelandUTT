@extends('layouts.coffeetable')

@section('title')
    เพิ่มดอกไม้
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" >เพิ่มข้อมูล</div>

                <div class="card-body">
                  
                

<form method="POST" action="/folwers" enctype="multipart/form-data">  {{-- enctype="multipart/form-data" ใส่รูปภาพต้องมี--}}
                  @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">ชื่อดอกไม้</label>
    <input type="text" name="name_fol" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
   
  </div>

  <div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">รายละเอียด</Details></label>
    <textarea type="text" name="detail_fol" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">สีดอกไม้</Details></label>
    <input type="text" name="color" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">ราคา</Details></label>
    <input type="text" name="price" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">รูปดอกไม้</Details></label>
    {{-- <input type="text" name="image_fol" class="form-control" id="exampleInputPassword1"> --}}
    {{-- <input type="file" name="image_fol" accept="image/*"  required> --}}
    <input type="file" class="form-control-file" id="image_fol" name="image_fol" accept="image/*" required>
  </div>
  
  <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
</form>

                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection