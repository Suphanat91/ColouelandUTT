@extends('layouts.coffeetable')
@section('title')
ดอกไม้
@endsection

@section('content')

        <div class="card shadow mb-4" style="margin: 3rem">
          <div class="card-hrader py-3">
            <h6 class=" font-weight-bold text-primary ml-4 mt-3">ข้อความคิดเห็นของผู้ใช้งาน</h6>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <th>ลำดับ</th>
                  <th>ชื่อผู้ใช้งาน</th>
                  {{-- <th>รายละเอียด</th> --}}
                  <th>สถานะผู้ใช้งาน</th>
                  <th>ชื่อดอกไม้</th>
                  <th>รูปดอกไม้</th>
                  <th>ความคิดเห็น</th>
                </thead>
                
                <tbody>
                  @foreach($comments as $d)

                  <tr>
                    <th scope="row">{{$d->idcomment}}</th>
                    
                    <td>{{$d->user->name}}</a></td>
                    <td>{{$d->user->status}}</a></td>
                    <td>{{$d->folwer->name_fol}}</a></td>
                    {{-- <td>{{$d->folwer->image_fol}}</a></td> --}}
                    <td>
                    <img src="{{ asset('storage/' . $d->folwer->image_fol) }}" alt="{{ $d->folwer->image_fol }}" style="width: 90px; height: 90px; box-shadow: 0px 0px 10px #888888; border-radius: 10px; display: block; margin: auto;">
                  </td>
                    <td>{{$d->comment}}</a></td>
                    {{-- <td>{{ $d->count ?? '0' }} ถาด</td> --}}

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
          <script>
            function confirmDelete(event) {
                if(!confirm('คุณแน่ใจหรือไม่ว่าต้องการลบ?')) {
                    event.preventDefault();
                }
            }
            </script>






  @endsection