@extends('layouts.coffeetable')
@section('title')
ดอกไม้
@endsection


@section('content')

        <div class="card shadow mb-4" style="margin: 3rem">
          <div class="card-hrader py-3">
            <h6 class=" font-weight-bold text-primary ml-4 mt-3">ข้อมูลดอกไม้</h6>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <th>ลำดับ</th>
                  <th>ชื่อดอกไม่</th>
                  {{-- <th>รายละเอียด</th> --}}
                  <th>สีดอกไม้</th>
                  <th>ราคา</th>
                  <th>รูปดอกไม้</th>
                  <th>จัดการ</th>
                </thead>
                
                <tbody>
                  @foreach($data as $d)

                  <tr>
                    <th scope="row">{{$d->idfolwer}}</th>
                    <td><a href="/detail/{{$d->idfolwer}}" style="color: rgba(13, 59, 243, 0.782)"> {{$d->name_fol}}</a></td>
                    
                    <td>{{$d->color}}</td>
                    <td>{{$d->price}} บาท</td>
                    
                    <td>
                      @if ($d->image_fol)
                        <img src="{{ asset('storage/' . $d->image_fol) }}" alt="{{ $d->name_fol }}" style="width: 90px; height: 90px; box-shadow: 0px 0px 10px #888888; border-radius: 10px; display: block; margin: auto;">
                      @else
                        ไม่มีรูปนะคะ!!!!
                      @endif
                    </td>
                    
                    <td>
                      <a href="/folwers/{{$d->idfolwer}}/edit" class="btn btn-warning">แก้ไข</a>

                      
                      <form action="/folwers/{{$d->idfolwer}}" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger" onclick="confirmDelete(event)">ลบ</button>
                      </form>
                    </td>
                  </tr>

                  @endforeach
                </tbody>
              </table>
              <a href="/folwers/create" class="btn btn-primary">เพิ่มข้อมูล</a>
              </table>
            </div>
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
  {{-- @include('home') --}}
  