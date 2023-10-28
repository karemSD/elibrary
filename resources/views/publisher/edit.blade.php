<x-admin-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
      <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">Edit publisher</h2>
        <p class="mb-4">Edit: {{$publisher->name}}</p>
      </header>

      <form method="POST" action="/publishers/{{$publisher->id}}">
        @csrf
        @method('PUT')
        <div class="mb-6">
          <label for="publisher" class="inline-block text-lg mb-2">publisher Name</label>
          <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name"
            value="{{$publisher->name}}" />

          @error('name')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>

          <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
            Update publisher
          </button>

          <a href="/publishers" class="text-black ml-4"> Back </a>
        </div>
      </form>
    </x-card>
  </x-admin-layout>
