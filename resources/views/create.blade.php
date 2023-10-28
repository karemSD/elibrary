<x-admin-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
      <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1"> Create @yield('title')</h2>

      </header>

      <form method="POST" action=@yield('title4') >
        @csrf
        <div class="mb-6">
          <label for="name" class="inline-block text-lg mb-2">@yield('title2') Name</label>
          <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name"
            value="{{old('name')}}"  required />

          @error('name')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>

        <div class="mb-6">
          <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
            Create @yield('title3')
          </button>

          <a href=@yield('title4') class="text-black ml-4"> Back </a>
        </div>
      </form>
    </x-card>
  </x-admin-layout>
