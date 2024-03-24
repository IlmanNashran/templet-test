@extends('templates.layouts.app')

@section('content')

    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <div id="kt_app_content_container" class="app-container container-fluid">
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Dashboard</li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Terkini</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->         
                    <div class="card mt-2">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5>
                                    <i class="fas fa-chart-bar"></i> DASHBOARD [{{ $today }}]
                                </h5>
                            </div>
                        </div>

                        <!-- <div id="tableauViz"></div> -->

                        <!--begin::Card body-->
                        <div class="card-body py-4">
                            <div class="container mt-5">
                                <div class="mb-3 d-flex">
                                    <div class="ms-auto">
                                        <a href="{{ route('complaints.create') }}" class="btn btn-sm btn-primary">
                                            <i class="fas fa-plus"></i> Aduan
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mt-3 col-md-4">
                                        <div class="card bg-light text-white">
                                            <a href="{{ route('complaints.index') }}">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $total_complaints }}</h5>
                                                    <p class="card-text">Aduan</p>
                                                </div>
                                                <div class="card-footer bg-success p-2">
                                                    <a href="#" class="text-black"></a>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mt-3 col-md-4">
                                        <div class="card bg-light text-white">
                                            <a href="{{ route('new-complaints.index') }}">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $total_new_complaints }}</h5>
                                                    <p class="card-text">Baharu</p>
                                                </div>
                                                <div class="card-footer bg-warning p-2">
                                                    <a href="#" class="text-black"></a>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mt-3 col-md-4">
                                        <div class="card bg-light text-white">
                                            <a href="{{ route('responded-complaints.index') }}">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $total_responded_complaints }}</h5>
                                                    <p class="card-text">Dijawab</p>
                                                </div>
                                                <div class="card-footer bg-primary p-2">
                                                    <a href="#" class="text-black"></a>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mt-3 col-md-4">
                                        <div class="card bg-light text-white">
                                            <a href="#">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $total_completed_complaints }}</h5>
                                                    <p class="card-text">Selesai</p>
                                                </div> 
                                                <div class="card-footer bg-primary p-2">
                                                    <a href="#" class="text-black"></a>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mt-3 col-md-4">
                                        <div class="card bg-light text-white">
                                            <a href="{{ route('to-rate-complaints.index') }}">
                                                <div class="card-body">
                                                    <h5 class="card-title">
                                                        @if(auth()->user()->role === 'staff' || auth()->user()->role === 'technician')
                                                            {{ $total_to_rate_complaints_peruser }}
                                                        @endif
                                                        @if(auth()->user()->role === 'manager' || auth()->user()->role === 'supervisor')
                                                            {{ $total_to_rate_complaints_peruser }}
                                                        @endif
                                                        
                                                    </h5>
                                                    <p class="card-text">Untuk Dinilai
                                                        @if(auth()->user()->role === 'manager' || auth()->user()->role === 'supervisor')
                                                            (Jumlah: {{ $total_to_rate_complaints }})
                                                        @endif
                                                    </p>
                                                </div>
                                                <div class="card-footer bg-primary p-2">
                                                    <a href="#" class="text-black"></a>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mt-3 col-md-4">
                                        <div class="card bg-light text-white">
                                            <a href="{{ route('kiv-complaints.index') }}">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $total_kiv_complaints }}</h5>
                                                    <p class="card-text">KIV</p>
                                                </div>
                                                <div class="card-footer bg-danger p-2">
                                                    <a href="#" class="text-black"></a>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </row>
                            </div>

                        </div>
                        <!--end::Card body-->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .card-title {
            font-size: 24px;
            margin-bottom: 10px;
            font-weight: bolder;
            color: #800000;
        }

        .card-text{
            color: black;
        }
    </style>

@endsection


