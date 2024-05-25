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
                  <th>ชื่อผู้ปลูก</th>
                  {{-- <th>รายละเอียด</th> --}}
                  <th>ชื่อดอกไม้</th>
                  <th>จำนวน</th>
                  {{-- <th>จัดการ</th> --}}
                </thead>
                
                <tbody>
                  @foreach($generates as $d)

                  <tr>
                    <th scope="row">{{$d->idgenerate}}</th>
                    
                    <td>{{$d->user->name}}</a></td>
                    <td>{{$d->folwer->name_fol}}</a></td>
                    <td>{{ $d->count ?? '0' }} ถาด</td>

                    {{-- <td>{{$d->count}}ถาด</td> --}}
                    
                    {{-- <td> --}}
                      {{-- <a href="/folwers/{{$d->idfolwer}}/edit" class="btn btn-primary">ให้งาน</a> --}}

                      
                      {{-- <form action="/folwers/{{$d->idfolwer}}" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger" onclick="confirmDelete(event)">ลบ</button>
                      </form> --}}
                    {{-- </td> --}}
                  </tr>

                  @endforeach
                </tbody>
              </table>
              {{-- <a href="/folwers/create" class="btn btn-primary">เพิ่มข้อมูล</a> --}}
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