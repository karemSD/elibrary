<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" href="images/favicon.ico" />
  <style>
    @media (min-width: 1025px) {
.h-custom {
height: 100vh !important;
}
}
  </style>
  <!-- CSS only -->
  <!-- JavaScript Bundle with Popper -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
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
  <title>e library</title>
</head>

<body class="mb-48" >
  <nav class="flex justify-between items-center mb-4">
    <a href="/"> <img class="w-50  "  src="{{asset('images/library.png')}}" alt="" class="logo" /></a>
    <ul class="flex space-x-6 mr-6 text-lg">
      @auth
      <li>
        <span class="font-bold uppercase">
        <a href="{{route('dashboard')}}"> Welcome {{auth()->user()->first_name   }} {{auth()->user()->last_name}}</a>
        </span>
      </li>

      <li>
        <form class="inline" method="POST" action="/logout">
          @csrf
          <button type="submit">
            <i class="fa-solid fa-door-closed"></i> Logout
          </button>
        </form>
      </li>
      @else
      <li>
        <a href="{{ route('users.create') }}" class="hover:text-laravel"><i class="fa-solid fa-user-plus"></i> Register</a>
      </li>
      <li>
        <a href="/login" class="hover:text-laravel"><i class="fa-solid fa-arrow-right-to-bracket"></i> Login</a>
      </li>
      @endauth
    </ul>

  </nav>

  <main>
    {{-- @auth --}}
    {{-- <div class="container">
        <div class="row bg-laravel ">
            <div class="col-md-12 ">
                <ul class="menu">

                    <li><a href="/authors">Authors</a></li>
                    <li><a href="/publishers">Publishers</a></li>
                    <li><a href="/categorys">Categories</a></li>
                    <li><a href="/customers">Customers</a></li>
                    <li><a class="dropdown-item" href="/books">Books</a></li>


                </ul>
            </div>
        </div>
    </div> --}}
    {{-- @endauth --}}
</div>
<br>
    {{$slot}}
  </main>
  <footer
    class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-white h-24 mt-24 opacity-90 md:justify-center">
    <p class="ml-2">Copyright &copy; 2022, All Rights reserved</p>
  </footer>
    {{-- <a href="/listings/create" class="absolute top-1/3 right-10 bg-black text-white py-2 px-5">Post Job</a> --}}


  <x-flash-message />
  <x-flash-message2 />
</body>

</html>
