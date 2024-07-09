@extends('layouts.coffeetable')
@section('title')
คำสั่งซื้อ
@endsection

@section('content')
<div class="card shadow mb-4" style="margin: 3rem">
  <div class="card-header py-3">
    <h6 class="font-weight-bold text-primary ml-4 mt-3">คำสั่งซื้อ</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ลำดับ</th>
            <th>ผู้ซื้อ</th>
            <th>จำนวนชนิดดอกไม้</th>
            <th>ราคารวมทั้งหมด</th>
            <th>ปี/เดือน/วัน</th>
            <th>รายละเอียด</th>
          </tr>
        </thead>
        <tbody>
          @foreach($data as $d)
          <tr>
            <th scope="row">{{$d->idorder}}</th>
            <td>{{$d->user->name}}</td>
            <td>{{$d->count_t}}</td>
            <td>{{$d->price_t}} บาท</td>
            <td>{{$d->created_at->format('Y/m/d')}}</td>
            <td>
              <a href="/orderlist/{{$d->idorder}}" class="btn btn-success">ดูรายละเอียด</a>
            </td>
          </tr>
          @endforeach
        </tbody>
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
</div>
@endsection
