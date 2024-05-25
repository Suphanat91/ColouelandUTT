@extends('layouts.coffeetable')
@section('title')
รายการดอกไม้ที่ถูกสั่งซื้อ
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
                  <th>ชื่อดอกไม้</th>
                  {{-- <th>รายละเอียด</th> --}}
                  <th>จำนวน</th>
                  <th>ราคา</th>
                  <th>ปี/เดือน/วัน</th>
                  <th>จัดการ</th>
                </thead>
                
                <tbody>
                  @foreach($orderItems as $d)

                  <tr>
                    <th scope="row">{{$d->idorderlist}}</th>
                   <td> {{$d->folwer->name_fol}}</td>
                    
                    <td>{{$d->count}} ถาด</td>
                    <td>{{$d->price}} บาท</td>
                    <td>{{$d->created_at}}</td> 
                    
                    
                    
                     
                      {{-- <form action="{{ route('orderlist.updateStatusTo2') }}" method="POST">
                        @csrf
                        <input type="hidden" name="status" value="{{ $d->status }}">
                        <button type="submit">ยอมรับ</button>
                    </form> --}}
                    
                     {{-- //Form for updating status to 5  --}}
                     {{-- <form action="{{ route('orderlist.updateStatusTo5') }}" method="POST">
                        @csrf
                        <input type="hidden" name="status" value="{{ $d->status }}">
                        <button type="submit">ยกเลิก</button>
                    </form> --}}
                    @if ($d->status2 == 1)
                    <td>
                    <form action="{{ route('orderlist.updateStatus') }}" method="POST" class="mb-1">
                      @csrf
                      <input type="hidden" name="order_idorder" value="{{ $d->idorderlist }}">
                      <input type="hidden" name="status2" value="2"> <!-- หรือ value="5" สำหรับฟอร์มยกเลิก -->
                      <button type="submit" class="btn btn-success">ยอมรับ</button> <!-- เปลี่ยนเป็น "ยกเลิก" ในฟอร์มยกเลิก -->
                  </form>
                  
                  
                  <form action="{{ route('orderlist.updateStatus') }}" method="POST">
                    @csrf
                    <input type="hidden" name="order_idorder" value="{{ $d->idorderlist }}">
                    <input type="hidden" name="status2" value="3"> <!-- หรือ value="5" สำหรับฟอร์มยกเลิก -->
                    <button type="submit" class="btn btn-danger">ไม่รับ</button> <!-- เปลี่ยนเป็น "ยกเลิก" ในฟอร์มยกเลิก -->
                </form>
              </td> 
                    {{-- @elseif ($d->status2 == 2)
                        <td><p class="text-success " class="fst-italic">ยอมรับคำสั่งซื้อเเล้ว</p></td>
                        @elseif ($d->status2 == 3)
                        <td><p class="text-danger " class="fst-italic">ไม่ยอมรับคำสั่งซื้อ</p></td> --}}
                    @endif
                    
                
                  
                    
                  </tr>

                  @endforeach
                </tbody>
              </table>
              
              </table>
            </div>
          </div>
          </div>
          
            






  @endsection
  {{-- @include('home') --}}
  