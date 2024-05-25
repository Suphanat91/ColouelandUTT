@extends('layouts.coffeetable')
@section('title')
ตอบข้อความ
@endsection

@section('content')
<div class="container">
    <h1>ตอบข้อความ</h1>
    <div class="card">
        <div class="card-body">
            <p>{{$data->masage}}</p>
            <form method="POST" action="/replymas/{{$data->idchat}}"> 
                @csrf
                <div class="mb-3">
                    <label for="replyInput" class="form-label">ข้อความตอบกลับ</label>
                    <input type="text" name="replymas" class="form-control" id="replyInput" aria-describedby="replyHelp">
                </div>
                <button type="submit" class="btn btn-primary">ส่ง</button>
            </form>        
        </div>
    </div>
</div>
@endsection
