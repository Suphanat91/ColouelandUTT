@extends('layouts.coffeetable')
@section('title')
    Home
@endsection

@section('conutcomment')
    @foreach ($comments as $item)
        <span class="badge badge-danger badge-counter">{{ $item->count() }}</span>
    @endforeach
@endsection

@section('alertcomment')
    @foreach ($comments as $item)
        <a class="dropdown-item d-flex align-items-center" href="#">
            <div class="mr-3">
                <div class="icon-circle bg-primary">
                    @if($item->user && $item->user->profile_image)
                        <img src="{{ asset('storage/' . $item->user->profile_image) }}" alt="{{ $item->user->profile_image }}" style="width: 40px; height: 40px; box-shadow: 0px 0px 10px #888888; border-radius: 10px; display: block; margin: auto;">
                    @else
                        <img src="{{ asset('storage/default.png') }}" alt="default image" style="width: 40px; height: 40px; box-shadow: 0px 0px 10px #888888; border-radius: 10px; display: block; margin: auto;">
                    @endif
                </div>
            </div>
            <div>
                <div class="small text-gray-500">{{ $item->created_at }}</div>
                <span class="font-weight-bold">{{ $item->comment }}</span>
            </div>
        </a>
    @endforeach
@endsection

@section('countchat')
    @foreach ($chat as $itemq)
        <span class="badge badge-danger badge-counter">{{ $unreadMessagesCount }}</span>
    @endforeach
@endsection

@section('alertchat')
    @foreach ($chat as $i)
        <a class="dropdown-item d-flex align-items-center" href="/addreplymas/{{ $i->idchat }}">
            <div class="dropdown-list-image mr-3">
                @if($i->user && $i->user->profile_image)
                    <img src="{{ asset('storage/' . $i->user->profile_image) }}" alt="{{ $i->user->profile_image }}" style="width: 40px; height: 40px; box-shadow: 0px 0px 10px #888888; border-radius: 10px; display: block; margin: auto;">
                @else
                    <img src="{{ asset('storage/default.png') }}" alt="default image" style="width: 40px; height: 40px; box-shadow: 0px 0px 10px #888888; border-radius: 10px; display: block; margin: auto;">
                @endif
                <div class="status-indicator bg-success"></div>
            </div>
            <div class="font-weight-bold">
                <div class="text-truncate">{{ $i->masage }}</div>
                <div class="small text-gray-500">{{ $i->created_at }}</div>
            </div>
        </a>
    @endforeach
    <script src="{{ asset('js/cottom.js') }}"></script>
@endsection

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 ml-3">Dashboard</h1>
    </div>

    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <a href="{{ url('/orders') }}" class="text-xs font-weight-bold text-warning text-uppercase mb-1">คำสั่งซื้อ</a>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $orderCount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-bag-heart fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <a href="{{ url('/checkmoney') }}" class="text-xs font-weight-bold text-primary text-uppercase mb-1">คำสั่งซื้อที่รอตรวจสอบการโอนเงิน</a>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $countordertatezero }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-bag-heart fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <a href="{{ url('/generatelists') }}" class="text-xs font-weight-bold text-success text-uppercase mb-1">งานที่ต้องมอบหมาย</a>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $countorderlistmm }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-bag-heart fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-dark shadow h-100 py-2 ml-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                จำนวนผู้ใช้งาน
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $userCount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-people fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">จำนวนดอกไม้ที่ขายได้ในแต่ละเดือน</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">ภาพรวมเวลางานที่มอบหมาย</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="myPieChart"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle" style="color: #FF204E"></i> งานที่ทำมากกว่า 30 วัน
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle" style="color: #FAEF5D"></i> งานที่ทำมากกว่า 15 วัน
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle" style="color: #58E481"></i> งานที่ทำน้อยกว่า 15 วัน
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 mb-4">
            <!-- Project Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">ผู้ที่ส่งงานมากที่สุด</h6>
                </div>
                <div class="card-body d-flex flex-column">
                    @foreach($usersWithMostGenerateList as $user)
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h4 class="small font-weight-bold">{{ $user->name }}</h4>
                            <span class="font-weight-bold">{{ $user->total_imagework }}</span>
                        </div>
                        @php
                            $percentage = $user->total_imagework * 10;
                            $color = '';
                            if ($percentage < 10) {
                                $color = 'bg-danger';
                            } elseif ($percentage < 20) {
                                $color = 'bg-warning';
                            } elseif ($percentage < 30) {
                                $color = 'bg-info';
                            } elseif ($percentage < 40) {
                                $color = 'bg-primary';
                            } elseif ($percentage < 50) {
                                $color = 'bg-secondary';
                            } elseif ($percentage < 60) {
                                $color = 'bg-success';
                            } elseif ($percentage < 70) {
                                $color = 'bg-danger';
                            } elseif ($percentage < 80) {
                                $color = 'bg-warning';
                            } elseif ($percentage < 90) {
                                $color = 'bg-info';
                            } else {
                                $color = 'bg-primary';
                            }
                        @endphp
                        <div class="progress mb-4">
                            <div class="progress-bar {{ $color }}" role="progressbar" style="width: {{ $percentage }}%" aria-valuenow="{{ $percentage }}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Include ตัวแปร JavaScript เพื่อรับข้อมูลจำนวน days_elapsed -->
    <script>var daysElapsedData = @json($daysElapsedData);</script>
    <script>var monthlySalesData = @json($monthlySales);</script>
@endsection
