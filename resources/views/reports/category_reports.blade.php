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
                        <li class="breadcrumb-item text-muted">Kategori</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->         
                    <div class="card mt-2">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5>
                                    <i class="fas fa-file"></i> LAPORAN ADUAN MENGIKUT KATEGORI BAGI TAHUN {{$selected_year}}
                                </h5>
                            </div>
                        </div>

                        <!-- <div id="tableauViz"></div> -->

                        <!--begin::Card body-->
                        <div class="card-body py-4">
                            <form method="get">
                                <div class="row">
                                    <div class="col-md-8 mb-3">
                                        <label for="year" class="form-label">Tahun</label>
                                        <select name="year" id="year" class="form-select">
                                            <option value="" disabled selected>--Pilih tahun--</option>
                                            @foreach (range(2020, date('Y')) as $year)
                                                <option value="{{ $year }}" {{ $selected_year == $year ? 'selected' : ($selected_year === null && $year == date('Y') ? 'selected' : '') }}>{{ $year }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4" style="margin-top: 2.2rem;">
                                        <button type="submit" class="btn btn-primary">Cari</button>
                                    </div>
                                </div>
                            </form>

                            <div class="mt-2 table-responsive">
                                <table class="table table-sm table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th rowspan="2" class="text-center table-success">No</td>
                                            <th rowspan="2" class="text-center table-success">Kategori</td>
                                            <th colspan="12" class="text-center table-success">Bulan</td>
                                        </tr>
                                        <tr>
                                            @for ($month = 1; $month <= 12; $month++)
                                                <th class="text-center table-success" style="width: 50px;">{{ $month }}</th>
                                            @endfor
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($report as $index => $row)
                                            <tr>
                                                <td class="text-center">{{ $index + 1 }}</td>
                                                <td>{{ $row['category'] }}</td>
                                                @php
                                                    $totalForCategory = 0;
                                                @endphp
                                                @for ($month = 1; $month <= 12; $month++)
                                                    <td class="text-center">{{ $row['month_' . $month] }}</td>
                                                    @php
                                                        $totalForCategory += $row['month_' . $month];
                                                    @endphp
                                                @endfor
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot class="bg-dark text-white">
                                        <tr>
                                            <th colspan="2" class="table-success">Jumlah</th>
                                            @for ($month = 1; $month <= 12; $month++)
                                                <th class="text-center table-success">
                                                    @php
                                                        $totalForMonth = 0;
                                                        foreach ($report as $row) {
                                                            $totalForMonth += $row['month_' . $month];
                                                        }
                                                        echo $totalForMonth;
                                                    @endphp
                                                </th>
                                            @endfor
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


