@extends('templates.layouts.app')

@section('content')

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ratingButtons = document.querySelectorAll('.btn-rating');

            ratingButtons.forEach((button) => {
                button.addEventListener('click', () => {
                    const rating = parseInt(button.getAttribute('data-rating'), 10);
                    const cardId = button.closest('.star-rating').getAttribute('data-card-id');
                    const stars = document.querySelectorAll(`.star-rating[data-card-id="${cardId}"] .btn-rating`);
                    const selectedRating = document.getElementById(`selected-rating-${cardId}`);
                    const hiddenInput = document.getElementById(`rating-${cardId}`);

                    updateRating(rating, stars, selectedRating, hiddenInput);
                });
            });

            function updateRating(rating, buttons, selectedRating, hiddenInput) {
                buttons.forEach((button, index) => {
                    const buttonRating = index + 1;
                    button.classList.toggle('active', buttonRating <= rating);
                });

                selectedRating.innerText = rating;
                hiddenInput.value = rating;
            }
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
                        <li class="breadcrumb-item text-muted">Untuk Dinilai</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->         
                    <div class="card mt-2">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5>
                                    <i class="fas fa-file"></i> ADUAN UNTUK DINILAI
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

                        <span>Jumlah aduan: {{ $complaints_peruser->count() }} perlu dinilai (keseluruhan: {{ $complaints->count() }} aduan)</span>
                        <!-- <span>Jumlah aduan: 
                        @if(auth()->user()->role === 'manager' || auth()->user()->role === 'supervisor') 
                            {{ $complaints->count() }}
                        @endif
                        @if(auth()->user()->role === 'technician') 
                            {{ $complaints->where('technician_id', auth()->user()->id)->count() }}
                        @endif
                        </span>  -->
                        <br>
                        
                        <div class="row">
                            @foreach($complaints_peruser as $complaint)
                                <div class="col-md-4 mb-3">
                                    <div class="card" data-card-id="{{ $complaint->id }}">
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
                                                
                                                @if($complaint->technician_remark)
                                                    <p class="card-text">
                                                        <strong>Catatan PIC:</strong><br>
                                                        {{ $complaint->technician_remark }}
                                                    </p>
                                                @endif

                                                @if($complaint->supervisor_remark)
                                                    <p class="card-text">
                                                        <strong>Catatan Penyelia:</strong><br>
                                                        {{ $complaint->supervisor_remark }}
                                                    </p>
                                                @endif
                                                <form method="post" action="{{ route('to-rate-complaints.update-rating', $complaint) }}">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <div class="star-rating" data-card-id="{{ $complaint->id }}">
                                                            @for ($i = 1; $i <= 5; $i++)
                                                                <button type="button" class="btn btn-sm btn-outline-primary btn-rating" data-rating="{{ $i }}">{{ $i }}</button>
                                                            @endfor
                                                        </div>
                                                        <input type="hidden" name="rating" id="rating-{{ $complaint->id }}" value="0">
                                                        <p class="mt-3">Selected rating: <span id="selected-rating-{{ $complaint->id }}">0</span></p>
                                                    </div>
                                                    <div class="mb-3">
                                                        <textarea class="form-control" id="rating_remark" name="rating_remark" placeholder="Catatan" rows="3"></textarea>
                                                    </div>
                                                    <button type="submit" class="btn btn-sm btn-primary btn-rate">
                                                        <i class="fas fa-check"></i> Rate
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

