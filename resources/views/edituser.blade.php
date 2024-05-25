@extends('layouts.coffeetable')

@section('title', 'แก้ไขผู้ใช้งาน')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">แก้ไขข้อมูลผู้ใช้งาน</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('users.update', $data->id) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                          <label for="profile_image" class="form-label">รูปโปรไฟล์</label>
                          <div>


                        <div class="upload">
                          @if ($data->profile_image)
                              <img src="{{ asset('storage/' . $data->profile_image) }}" alt="{{ $data->name }}" width="100px" height="100px" style="border-radius: 100%; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); display: block; margin: auto; ">
                          @else
                              <img src="{{ asset('img/004.jpg') }}" alt="image" width="100px" height="100px" style="border-radius: 100%; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); display: block; margin: auto;" >
                          @endif
                          <div class="round">
                            <input type="file" name="profile_image" accept="image/*" >
                            <i class="fa fa-camera" style="color: #fff"></i>
                          </div>
                        </div>
                          
                        
                          
                            
                          
                        
                       



                      </div>
                     </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">ชื่อผู้ใช้งาน</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{ $data->name }}">
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">อีเมลล์</label>
                            <input type="text" name="email" class="form-control" id="email" value="{{ $data->email }}">
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">สถานะ</label>
                            <select name="status" id="status" class="form-control">
                                <option value="admin" {{ $data->status == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="farmer" {{ $data->status == 'farmer' ? 'selected' : '' }}>Farmer</option>
                                <option value="user" {{ $data->status == 'user' ? 'selected' : '' }}>User</option>
                            </select>
                        </div>

                        
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
