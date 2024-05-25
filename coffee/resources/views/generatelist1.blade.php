@extends('layouts.coffeetable')
@section('title')
จ่ายงาน
@endsection


@section('content')



        
{{$data->idorderlist}}
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
            @foreach($data1 as $d)

            <tr>
              <th scope="row">{{$d->idgenerate}}</th>
              
              <td>{{$d->user->name}}</a></td>
              <td>{{$d->folwer->name_fol}}</a></td>
              <td>{{ $d->count ?? '0' }} ถาด</td>

              {{-- <td>{{$d->count}}ถาด</td> --}}
              
              
            </tr>

            @endforeach
          </tbody>
        </table>
        {{-- <a href="/folwers/create" class="btn btn-primary">เพิ่มข้อมูล</a> --}}
        </table>
      </div>
    </div>
    </div>
    <form method="POST" action="/generatelits1/{{$data->idorderlist}}">
      @csrf
    <div class="class="card shadow mb-4" style="margin: 3rem"">
        <div class="card-hrader py-3">
            <div class="card-body">
                <div class="card">
                    <div class="card-header "">จ่ายงาน</div>
                    <div class="card-body">
                    <div class="row mb-3">
                      <label for="status" class="col-md-4 col-form-label text-md-end">ผู้ปลูก</label>
                        <select name="user_id" id="user_id" class="form-control">
                            @foreach ($users as $user)
                                @if ($user->status == 'user') <!-- Assuming you have a 'status' column -->
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endif
                            @endforeach
                        </select>
                        
                    </div>
                    <div class="row mb-3">
                      <label for="exampleInputEmail1" class="form-label">จำนวน</label>
                      <input type="number" name="count_plant" class="form-control" id="countPlantInput" step="1">
                    </div>
                    <input type="hidden" name="status3" value="0" id="statusField">


                    <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                </div>
            </div>
        </div>
    </div>
    </div>
    
  </form>





  @endsection
  {{-- @include('home') --}}
  