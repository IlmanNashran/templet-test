@extends('templates.layouts.app')

@section('content')

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            // Toggle table on button click
            $("#toggleTable").click(function () {
                $("#complaintTable").toggle();
            });
        });
    </script>

    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <div id="kt_app_content_container" class="app-container container-fluid">
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Aduan</li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Aduan KIV</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->         
                    <div class="card mt-2">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5>
                                    <i class="fas fa-file"></i> ADUAN KIV
                                </h5>
                            </div>
                        </div>

                        
                        <!-- display message success or error -->
                        @if(session('success'))
                            <div class="alert alert-primary m-5">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if(session('error'))
                            <div class="alert alert-danger m-5">
                                {{ session('error') }}
                            </div>
                        @endif

                        <!--begin::Card body-->
                        <div class="card-body py-4">

                        <span>Jumlah aduan: {{ $complaints->count() }}</span>
                        <br>
                        
                        <div class="row">
                            @foreach($complaints as $complaint)
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h5>
                                                    <i class="fas fa-file"></i> {{ $complaint->report_no ?? null }} <span class="badge {{ $complaint->getStatusBadgeClass() }}">{{ $complaint->status }}</span>
                                                </h5>
                                            </div>    
                                        </div>
                                        <div class="card-body">
                                            <div class="sv_manager_view">
                                                <p class="card-text">
                                                    <strong>Tarikh:</strong> {{ \Carbon\Carbon::parse($complaint->created_at)->format('d-m-Y') }}<br>
                                                    ({{ \Carbon\Carbon::parse($complaint->created_at)->diffForHumans() }})
                                                </p>
                                                <p class="card-text">
                                                    <strong>Pelapor: </strong>{{ $complaint->user->name }}<br>
                                                    {{ $complaint->user->mobile_no }}
                                                </p>
                                                <p class="card-text">
                                                    <strong>Blok:</strong> {{ $complaint->block }}
                                                </p>
                                                <p class="card-text">
                                                    <strong>Kategori:</strong> {{ $complaint->category->name }}
                                                </p>
                                                <p class="card-text">
                                                    <strong>Lokasi:</strong> {{ $complaint->location }}
                                                </p>
                                                <p class="card-text">
                                                    <strong>Deskripsi:</strong><br>
                                                    {{ $complaint->description }}
                                                </p>
                                                <p class="card-text">
                                                    <strong>PIC:</strong><br>
                                                    {{ $complaint->technician->name }}
                                                </p>
                                                
                                                @if($complaint->supervisor_remark)
                                                    <p class="card-text">
                                                        <strong>Catatan Penyelia:</strong><br>
                                                        {{ $complaint->supervisor_remark }}
                                                    </p>
                                                @endif

                                                @if($complaint->technician_remark)
                                                    <p class="card-text">
                                                        <strong>Catatan PIC:</strong><br>
                                                        {{ $complaint->technician_remark }}
                                                    </p>
                                                @endif

                                                
                                                <form method="post" action="{{ route('kiv-complaints.update-status', $complaint) }}">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <select class="form-select" id="status" name="status">
                                                            <option value="">Pilih Status</option>
                                                            <option value="Dijawab">Dijawab</option>
                                                            <option value="Ditolak">Ditolak</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <textarea class="form-control" id="remark" name="remark" placeholder="Catatan" rows="3">{{ $complaint->remark }}</textarea>
                                                    </div>

                                                    <button type="submit" class="btn btn-sm btn-primary">
                                                        <i class="fas fa-check"></i> Kemaskini
                                                    </button>
                                                </form>
                                            </div>            
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        </div>
                            
                        </div>
                        <!--end::Card body-->
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

