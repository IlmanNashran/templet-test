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
                        <li class="breadcrumb-item text-muted">Aduan Baharu</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->         
                    <div class="card mt-2">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5>
                                    <i class="fas fa-file"></i> ADUAN BAHARU
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

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            @if(auth()->user()->role === 'manager')
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="task_assignment-tab" data-bs-toggle="tab" data-bs-target="#task_assignment" type="button" role="tab" aria-controls="task_assignment" aria-selected="true">Task assignment</button>
                                </li>
                            @elseif(auth()->user()->role === 'supervisor')
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="task_assignment-tab" data-bs-toggle="tab" data-bs-target="#task_assignment" type="button" role="tab" aria-controls="task_assignment" aria-selected="true">Task assignment</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="task_assigned-tab" data-bs-toggle="tab" data-bs-target="#task_assigned" type="button" role="tab" aria-controls="task_assigned" aria-selected="false">Task assigned</button>
                                </li>
                            @elseif(auth()->user()->role === 'technician')
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="task_assigned-tab" data-bs-toggle="tab" data-bs-target="#task_assigned" type="button" role="tab" aria-controls="task_assigned" aria-selected="true">Task assigned</button>
                                </li>
                            @endif
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show p-4 @if(auth()->user()->role === 'manager' || auth()->user()->role === 'supervisor'){{ 'active' }}@endif" id="task_assignment" role="tabpanel" aria-labelledby="task_assignment-tab">

                                <div class="mb-3">
                                    <form method="GET" action="{{ route('new-complaints.index') }}">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="No Aduan" name="search" value="{{ request('search') }}">
                                            <button class="btn btn-primary" type="submit">
                                                <i class="fas fa-search"></i> Cari
                                            </button>
                                        </div>
                                    </form>
                                </div>

                                <div class="mb-3">
                                    <div class="btn-group">
                                        <a href="{{ route('new-complaints.index') }}" class="badge" style="background-color: {{ empty(request('assigned')) ? '#28a745' : '#d3d3d3' }}; color: {{ empty(request('assigned')) ? '#fff' : '' }}">Semua</a> &nbsp;&nbsp;
                                        <a href="{{ route('new-complaints.index', ['assigned' => 1]) }}" class="badge text-decoration-none" style="background-color: {{ request('assigned') ? '#28a745' : '#d3d3d3' }}; color: {{ request('assigned') ? '#fff' : '' }}">Tugas Belum Diagihkan</a>
                                    </div>

                                    <p class="mt-2">Jumlah aduan: {{$complaints->count()}}</p>
                                </div>
                                <br>

                                <button class="btn btn-sm btn-primary mb-3" id="toggleTable"><i class="fas fa-table"></i>Ringkasan</button>

                                <table class="mb-3 table table-bordered table-hover small table-striped" id="complaintTable" style="display: none;">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">No Aduan</th>
                                            <th scope="col">Blok</th>
                                            <th scope="col">Kategori</th>
                                            <th scope="col">PIC</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($complaints as $complaint)
                                            <tr>
                                                <td>{{ $complaint->report_no }}</td>
                                                <td>{{ $complaint->block }}</td>
                                                <td>{{ $complaint->category->name }}</td>
                                                <td>{{ $complaint->technician->name ?? 'N/A'}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

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
                                                        <!-- <p class="card-text">
                                                            <strong>Catatan Penyelia:</strong><br>
                                                            {{ $complaint->supervisor_remark }}
                                                        </p> -->
        
                                                        <form method="post" action="{{ route('new-complaints.update-technician', $complaint) }}">
                                                            @csrf
                                                            <div class="mb-3">
                                                                <select class="form-select" id="technician" name="technician_id">
                                                                    <option value="">Pilih PIC</option>
                                                                    @foreach($technicians as $technician)
                                                                        <option value="{{ $technician->id }}" @if($technician->id == $complaint->technician_id) selected @endif>
                                                                            {{ $technician->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <textarea class="form-control" id="supervisor_remark" name="supervisor_remark" placeholder="Catatan" rows="3">{{ $complaint->supervisor_remark }}</textarea>
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
                            <div class="tab-pane fade p-4 @if(auth()->user()->role === 'technician'){{ 'show active' }}@endif" id="task_assigned" role="tabpanel" aria-labelledby="task_assigned-tab">
                                <span>Jumlah aduan: {{ $complaints->where('technician_id', auth()->user()->id)->count() }}</span>
                                <div class="row">
                                    @foreach($complaints as $complaint)
                                        @if($complaint->technician_id == auth()->user()->id)
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
                                                            <strong>Catatan Penyelia:</strong><br>
                                                            {{ $complaint->supervisor_remark }}
                                                        </p>
                                                        <form method="post" action="{{ route('new-complaints.update-status', $complaint) }}">
                                                            @csrf
                                                            <div class="mb-3">
                                                                <select class="form-select" id="status" name="status">
                                                                    <option value="">Pilih Status</option>
                                                                    <option value="Dijawab">Dijawab</option>
                                                                    <option value="KIV">KIV</option>
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <textarea class="form-control" id="technician_remark" name="technician_remark" placeholder="Catatan" rows="3"></textarea>
                                                            </div>

                                                            <button type="submit" class="btn btn-sm btn-primary">
                                                                <i class="fas fa-check"></i> Kemaskini
                                                            </button>
                                                        </form>
                                                    </div>            
                                                </div>

                                            </div>
                                        </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        </div>
                        <!--end::Card body-->
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

