@extends('layouts.coffeetable')
@section('title')
'งานที่สั่งคนปลูก'
@endsection


@section('content')

        <div class="card shadow mb-4" style="margin: 3rem">
          <div class="card-hrader py-3">
            <h6 class=" font-weight-bold text-primary ml-4 mt-3">ข้อมูลงาน</h6>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <th>ลำดับ</th>
                  <th>ชื่อคนทำงาน(คนปลูก)</th>
                  {{-- <th>รายละเอียด</th> --}}
                  <th>ชื่อดอกไม้</th>
                  <th>จำนวน</th>
                  {{-- <th>ราคา</th> --}}
                  <th>สถานะ</th>
                  <th>จำนวนวันที่ทำ</th>
                </thead>
                
                <tbody>
                  @foreach($generatelist as $d)

                  <tr>
                    <th scope="row">{{$d->idgenerate_list}}</th>
                    {{-- <td><a href="/detail/{{$d->idfolwer}}" style="color: rgba(13, 59, 243, 0.782)"> {{$d->name_fol}}</a></td> --}}
                    
                    <td>{{$d->user->name}}</td>
                    <td>{{$d->orderlist->folwer->name_fol}} บาท</td>
                    <td>{{$d->count_plant}} ถาด</td>
                    {{-- <td>{{$d->count_plant}}</td> --}}
                    <td style="display: flex; justify-content: center; align-items: center;">
                      @if($d->days_elapsed >= 30)
                          <div style="width: 50px;
                          height: 50px;
                          border-radius: 50%;
                          background-color: #E72929;
                          display: flex;
                          justify-content: center;
                          align-items: center;
                          color: #fff;
                          font-size: 24px;"></div>
                      @elseif($d->days_elapsed >= 15)
                          <div style="width: 50px;
                          height: 50px;
                          border-radius: 50%;
                          background-color: #F8E559;
                          display: flex;
                          justify-content: center;
                          align-items: center;
                          color: #fff;
                          font-size: 24px;"></div>
                      @else
                          <div style="width: 50px;
                          height: 50px;
                          border-radius: 50%;
                          background-color: #A6FF96;
                          display: flex;
                          justify-content: center;
                          align-items: center;
                          color: #fff;
                          font-size: 24px;"></div>
                      @endif

                    </td>
                    <td>{{$d->days_elapsed}} วัน</td>
                    {{-- <td>
                      @if ($d->image_fol)
                        <img src="{{ asset('storage/' . $d->image_fol) }}" alt="{{ $d->name_fol }}" style="width: 90px; height: 90px; box-shadow: 0px 0px 10px #888888; border-radius: 10px; display: block; margin: auto;">
                      @else
                        ไม่มีรูปนะคะ!!!!
                      @endif
                    </td> --}}
                    
                    {{-- <td>
                      <a href="/folwers/{{$d->idfolwer}}/edit" class="btn btn-warning">แก้ไข</a>

                      
                      <form action="/folwers/{{$d->idfolwer}}" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger" onclick="confirmDelete(event)">ลบ</button>
                      </form>
                    </td> --}}
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
  