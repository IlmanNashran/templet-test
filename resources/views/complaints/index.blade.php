@extends('templates.layouts.app')

@section('content')

    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables JS -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>


    <script>
        $(document).ready(function () {
            // DataTable initialization
            var table = $('#complaintsTable').DataTable({
                "paging": true,
                "ordering": true,
                "info": true,
                "searching": true, // Enable global search
                "drawCallback": function (settings) {
                    // Show the table after DataTables has been fully initialized
                    $('#complaintsTable').show();
                }
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
                        <li class="breadcrumb-item text-muted">Semua Aduan</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->         
                    <div class="card mt-2">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5>
                                    <i class="fas fa-file"></i> SEMUA ADUAN
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
                            <!-- Button to create complaint-->
                            <div class="mb-3 d-flex">
                                <div class="ms-auto">
                                    <a href="{{ route('complaints.create') }}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-plus"></i> Aduan
                                    </a>
                                </div>
                            </div>

                            <!-- Create table all complaint-->
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="complaintsTable" style="display: none;">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col text-nowrap">No.</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">No Aduan</th>
                                            <th scope="col">Tarikh</th>
                                            <th scope="col">Pelapor</th>
                                            <th scope="col">Kategori</th>
                                            <th scope="col">Blok</th>
                                            <th scope="col">PIC</th>
                                            <th scope="col">Tindakan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($complaints as $complaint)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td><span class="badge {{ $complaint->getStatusBadgeClass() }}">{{ $complaint->status }}</span></td>
                                            <th scope="row">{{ $complaint->report_no ?? null }}</th>
                                            <td>{{ \Carbon\Carbon::parse($complaint->created_at)->format('d-m-Y') }}</td>
                                            <td>{{ $complaint->user->name }}</td>
                                            <td>{{ $complaint->category->name }}</td>
                                            <td>{{ $complaint->block }}</td>
                                            <td>{{ $complaint->technician->name ?? null }}</td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fas fa-cog"></i>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="{{ route('complaints.show', $complaint) }}">Papar</a></li>
                                                </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                        </div>
                        <!--end::Card body-->
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

