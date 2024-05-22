@extends('templates.welcome')





@section('title', 'Crea Prodotto')
@section('content')




    <body>
        <div class="container d-flex vh-100">
            <div class="row justify-content-center align-self-center w-100">
                <div class="col-12 text-center">
                    <h1 class="mb-4">Benvenuti nell'Archivio dei Videogiochi</h1>
                    <div class="d-grid gap-2 d-md-block">
                        @if (Route::has('login'))

                            @auth
                                <a href="{{ url('/dashboard') }}"
                                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"><button>Dashboard</button>

                                </a>
                            @else
                                <a href="{{ route('login') }}"
                                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"><button
                                        class="btn btn-primary">Log in</button>

                                </a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"><button
                                            class="btn btn-secondary">Register</button>

                                    </a>
                                @endif
                            @endauth

                        @endif
                    </div>
                </div>
            </div>
        </div>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    @endsection
