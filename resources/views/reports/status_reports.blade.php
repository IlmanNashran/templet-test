@extends('templates.layouts.app')

@section('content')


    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <div id="kt_app_content_container" class="app-container container-fluid">
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Laporan</li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Status</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->         
                    <div class="card mt-2">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5>
                                    <i class="fas fa-file"></i> LAPORAN ADUAN MENGIKUT PIC
                                </h5>
                            </div>
                        </div>

                        <!-- <div id="tableauViz"></div> -->

                        <!--begin::Card body-->
                        <div class="card-body py-4">
                            <div class="mt-2 table-responsive">
                                <table class="mt-5 table table-sm table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="table-success">Nama petugas</th>
                                            <th class="table-success">Peranan</th>
                                            <th class="text-center table-success">Baharu</th>
                                            <th class="text-center table-success">Dijawab</th>
                                            <th class="text-center table-success">Selesai</th>
                                            <th class="text-center table-success">Dinilai</th>
                                            <th class="text-center table-success">KIV</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users_status_count as $user)
                                            <tr>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->role }}</td>
                                                <td class="text-center">{{ $user->Baharu }}</td>
                                                <td class="text-center">{{ $user->Dijawab }}</td>
                                                <td class="text-center">{{ $user->Selesai }}</td>
                                                <td class="text-center">{{ $user->Dinilai }}</td>
                                                <td class="text-center">{{ $user->KIV }}</td>
                                            </tr>
                                        @endforeach
                                        
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="2" class="text-center table-success">Jumlah</th>
                                            <th class="text-center table-success">{{ $users_status_count->sum('Baharu') }}</th>
                                            <th class="text-center table-success">{{ $users_status_count->sum('Dijawab') }}</th>
                                            <th class="text-center table-success">{{ $users_status_count->sum('Selesai') }}</th>
                                            <th class="text-center table-success">{{ $users_status_count->sum('Dinilai') }}</th>
                                            <th class="text-center table-success">{{ $users_status_count->sum('KIV') }}</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>                     
                        </div>
                        <!--end::Card body-->
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


