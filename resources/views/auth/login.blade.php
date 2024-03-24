<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head><base href=""/>
		<title>e-Aduan</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:url" content="https://keenthemes.com/metronic" />
		<meta property="og:site_name" content="Keenthemes | Metronic" />
		<link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
		<link rel="shortcut icon" href="{{ asset('img/favicon.ico')}}" />
		<!--begin::Fonts(mandatory for all pages)-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
		<!--end::Fonts-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
		<!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
		<link href="{{ asset('metronic-template/dist/assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('metronic-template/dist/assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
		<script>// Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }</script>
		<!--begin::Icon(used by all pages)-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
		<!--end::Icon-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
	
	</head>


<body>
    <section class="h-100 gradient-form" style="background-color: #eee;">
        <div class="container h-100">
         <section class="h-100 gradient-form d-flex justify-content-center align-items-center" style="background-color: #eee;">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black">
                        <div class="row g-0">
                            <div class="col-lg-7">
                                <div class="card-body p-md-5 mx-md-4">

                                    <div class="bg-light text-center">
                                        <h2 class="mt-1 mb-3 pb-1" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
                                            <b>
                                                <i class="fas fa-user" style="font-size: 1.2em;"></i> <!-- User icon with maroon color -->
                                                <span style="font-style: italic;">e</span><span>-Aduan </span><span style="color: #800000;">FGVIC</span>
                                            </b>
                                        </h2>                                 
                                    </div>

                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-outline mb-3">
                                            <label class="form-label" for="email">Emel</label>
                                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan emel" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-outline mb-2">
                                            <label class="form-label" for="password">Kata laluan</label>
                                            <div class="input-group">
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan kata laluan" name="password" required autocomplete="current-password">
                                                <span class="input-group-text">
                                                    <i class="fas fa-eye" id="togglePassword"></i>
                                                </span>
                                            </div>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-outline mb-5">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                <label class="form-check-label" for="remember" style="color: #A5A4A4"> 
                                                    {{ __('Remember Me') }}
                                                </label>
                                            </div>
                                        </div>

                                        <button type="submit" class="mt-5 btn btn-sm btn-primary" style="min-width:100%;">
                                            Log Masuk
                                        </button>

                                        <div class="form-outline d-flex justify-content-center">
                                            @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}" style="color: #d8363a;">Lupa kata laluan</a>
                                            @endif
                                        </div>

                                    </form>

                                </div>
                            </div>
                            
                            <div class="col-lg-5 d-flex align-items-center gradient-custom-2">
                                <!-- <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                    <h2 class="mb-2">FGV BunchTracker</h2>
                                    <p class="medium mb-0">Tracking . Quality . Sustainability</p>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#password");

        togglePassword.addEventListener("click", function () {
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            togglePassword.classList.toggle("fa-eye");
            togglePassword.classList.toggle("fa-eye-slash");
        });
    </script>

    <style>
    .gradient-custom-2 {
        position: relative;
        background: url('{{ asset("images/fgvic.jpg") }}') center/cover;

        /* Overlay */
        &:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5); /* Adjust the alpha value (last parameter) for the desired transparency */
        }
    }

    .gradient-custom-2 .text-white {
        position: relative;
        z-index: 1; /* Ensure the text is on top of the overlay */
    }
        @media (min-width: 768px) {
            .gradient-form {
                min-height: 100vh !important;
                display: flex;
                align-items: center;
            }
        }
        @media (min-width: 769px) {
            .gradient-custom-2 {
            border-top-right-radius: .3rem;
            border-bottom-right-radius: .3rem;
            }
        }

    </style>
</body>

