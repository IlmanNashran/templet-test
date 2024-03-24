@extends('templates.layouts.app')

@section('content')

    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

    <script>
        jQuery(document).ready(function($) {
            // Use $ here
            $('#category').select2();
            $('#block').select2();
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
                        <li class="breadcrumb-item text-muted">Daftar</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->         
                    <div class="card mt-2">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5>
                                    <i class="fas fa-file"></i> DAFTAR ADUAN
                                </h5>
                            </div>
                        </div>

                        <!-- <div id="tableauViz"></div> -->

                        <!--begin::Card body-->
                        <div class="card-body py-4">
                            <div class="container mt-5">
                                <form method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="category" class="form-label required">Pilih Kategori</label>
                                        <select class="form-select" id="category" name="category_id" required>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="block" class="form-label required">Pilih Blok</label>
                                        <select class="form-select" id="block" name="block" required>
                                                <option value="A">Blok A</option>
                                                <option value="A1">Blok A1</option>
                                                <option value="B">Blok B</option>
                                                <option value="B1">Blok B1</option>
                                                <option value="C">Blok C</option>
                                                <option value="C1">Blok C1</option>
                                                <option value="D">Blok D</option>
                                                <option value="E">Blok E</option>
                                                <option value="F">Blok F</option>
                                                <option value="G">Blok G</option>
                                                <option value="H">Blok H</option>
                                                <option value="I">Blok I</option>
                                                <option value="J">Blok J</option>
                                                <option value="BMC">Bangunan BMC</option>
                                                <option value="FT">Bangunan FT</option>
                                                <option value="Lain-lain">Lain-lain</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="location" class="form-label required">lokasi</label>
                                        <input class="form-control" id="location" name="location" required></input>
                                    </div>

                                    <div class="mb-3">
                                        <label for="description" class="form-label required">Deskripsi</label>
                                        <textarea class="form-control" id="description" name="description">

                                        </textarea>
                                    </div>

                                    <button type="submit" class="btn btn-sm btn-primary">
                                        <i class="fas fa-check"></i> Daftar
                                    </button>
                                </form>
                            </div>
                        </div>
                        <!--end::Card body-->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Style to make Select2 look like form-control */
        .select2-container {
            width: 100% !important;
        }

        .select2-container .select2-selection--single {
            height: 38px;
            border: 1px solid #ced4da;
            border-radius: 4px;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 38px;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 38px;
            position: absolute;
            top: 1px;
        }
    </style>

@endsection


