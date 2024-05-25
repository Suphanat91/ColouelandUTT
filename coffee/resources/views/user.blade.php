@extends('layouts.coffeetable')
@section('title')
ผู้ใช้งาน
@endsection

@section('content')

        <div class="card shadow mb-4" style="margin: 3rem">
          <div class="card-hrader py-3">
            <h6 class=" font-weight-bold text-primary ml-4 mt-3">ข้อมูลผู้ใช้งาน</h6>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <th>ลำดับ</th>
                  <th>ชื่อ</th>
                  {{-- <th>รายละเอียด</th> --}}
                  <th>อีเมลล์</th>
                  <th>สถานะ</th>
                  {{-- <th>รูปดอกไม้</th> --}}
                  <th>รูปโปรไฟล์</th>
                  <th>จัดการ</th>
                </thead>
                
                <tbody>
                  @foreach($data as $d)

                  <tr>
                    <th scope="row">{{$d->id}}</th>
                    <td> {{$d->name}}</td>
                    
                    <td>{{$d->email}}</td>
                    
                    <td>{{$d->status}}</td>
                    {{-- <td>{{$d->proflie_image}}</td> --}}
                    <td>


                      {{-- @if ($d->proflie_image)
                        <img src="{{ asset('storage/' . $d->proflie_image) }}" alt="" style="width: 90px; height: 90px; box-shadow: 0px 0px 10px #888888; border-radius: 10px; display: block; margin: auto;">
                      @else
                        No Image
                      @endif --}}


                      @if ($d->profile_image)
                      <img src="{{ asset('storage/' . $d->profile_image) }}" alt="" style="width: 110px; height: 110px; box-shadow: 0px 0px 10px #888888; border-radius: 100%; display: block; margin: auto;">
                    @else
                    <img src="{{ asset('img/004.jpg') }}" alt="" width="100px" height="100px" style="border-radius: 100%; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); display: block; margin: auto; ">
                    @endif
                    </td>
                    <td>
                      <a href="/users/{{$d->id}}/edit" class="btn btn-warning">แก้ไข</a>

                      
                      <form action="/users/{{$d->id}}" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger" onclick="confirmDelete(event)">ลบ</button>
                      </form>
                    </td>
                  </tr>

                  @endforeach
                </tbody>
              </table>
              {{-- <a href="{{ route('register') }}" class="btn btn-primary">เพิ่มข้อมูล</a> --}}
              </table>
            </div>
          </div>
          <script>
            function confirmDelete(event) {
                if(!confirm('คุณแน่ใจหรือไม่ว่าต้องการลบ?')) {
                    event.preventDefault();
                }
            }
            </script>






  @endsection