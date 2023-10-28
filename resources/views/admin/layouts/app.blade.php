<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">



        <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}"> <!-- Bootstrap -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
          <script src="//unpkg.com/alpinejs" defer></script>
          <script src="https://cdn.tailwindcss.com"></script>
          <script>
            tailwind.config = {
                theme: {
                  extend: {
                    colors: {
                      laravel: '#ef3b2d',
                    },
                  },
                },
              }
          </script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased ">

            @include('admin.layouts.navigation')

            <br>

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif


            <div class="container">
                <div class="row bg-laravel ">
                    <div class="col-md-12 ">
                        <ul class="menu">

                            <li><a href="/authors">Authors</a></li>
                            <li><a href="/publishers">Publishers</a></li>
                            <li><a href="/categorys">Categories</a></li>
                            <li><a href="/users">Customers</a></li>
                            <li><a class="dropdown-item" href="{{route('admin.dashboard')}}">Books</a></li>


                        </ul>
                    </div>
                </div>
            </div>
            {{-- @endauth --}}
        </div>
        <br>
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
            <br>
            <br>
            <br>
            <footer
        class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-white h-24 mt-24 opacity-90 md:justify-center">
        <p class="ml-2">Copyright &copy; 2022, All Rights reserved</p>
      </footer>
        </div>
        <x-flash-message />
        <x-flash-message2 />
    </body>
</html>
