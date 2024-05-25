@extends('layouts.coffeetable')
@section('title')
    แก้ไขดอกไม้
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    

                   
                   <form method="POST" action="/folwers/{{$data->idfolwer}}" enctype="multipart/form-data"> 
                   @method('PUT') 
                   
                   @csrf
                   <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label" style="display: block">รูปดอกไม้</label>


                    <div class="upload">
                        @if ($data->image_fol)
                          <img src="{{ asset('storage/' . $data->image_fol) }}" alt="{{ $data->name_fol }}" width="100px" height="100px"  >
                           @else
                             No Image
                         @endif
                         <div class="round">
                          <input type="file" name="image_fol" accept="image/*">
                          <i class="fa fa-camera" style="color: #fff"></i>
                        </div>

                  
                    
                  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">ชื่อดอกไม้</label>
    <input type="text" name="name_fol" class="form-control" id="exampleInputEmail1" value="{{$data->name_fol}}">
  </div>

  <div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">รายละเอียด</label>
    <textarea type="text" name="detail_fol" class="form-control"  id="exampleFormControlTextarea1" row="3">{{$data->detail_fol}}"</textarea>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">สีดอกไม้</label>
    <input type="text" name="color" class="form-control" value="{{$data->color}}">
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">ราคาดอกไม้</label>
    <input type="text" name="price" class="form-control" value="{{$data->price}}">
  </div>

  
  
  <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
