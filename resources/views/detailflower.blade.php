@extends('layouts.coffeetable')

@section('title')
    ดอกไม้
@endsection

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg">
                <div class="card-header  bg-primary text-white">
                    <h2>รายละเอียดดอกไม้</h2>
                </div>

                <div class="card-body p-5">
                    <div class="text-center">
                        <img src="{{ asset('storage/' . $ob->image_fol) }}" alt="{{ $ob->name_fol }}" class="img-fluid rounded" style="width: 300px; height: 300px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                        <h3 class="mt-3">{{ $ob->name_fol }}</h3>
                        <p class="text-muted">{{ $ob->detail_fol }}</p>
                    </div>

                    {{-- Optionally, uncomment this section if you wish to display comments and user interactions
                    <hr>
                    <div class="mt-4">
                        <h5>รายการคำตอบ</h5>
                        <ul class="list-group list-group-flush">
                            @foreach($ob->comment as $o)
                            <li class="list-group-item">
                                {{ $o->comment }} ({{ $o->likes->count() }} likes)
                                <small class="text-primary">
                                    @foreach($o->likes as $l)
                                        {{ $l->userlike }},
                                    @endforeach
                                </small>
                            </li>
                            @endforeach
                        </ul>
                        <a href="/addcomment/{{$ob->id}}" class="btn btn-primary mt-3">เพิ่มคำตอบ</a>
                    </div>
                    --}}

                    <div class=" mt-4">
                        <a href="#" onclick="history.back()" class="btn btn-outline-primary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
