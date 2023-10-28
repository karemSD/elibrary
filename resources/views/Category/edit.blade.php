<x-admin-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
      <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">Edit Category</h2>
        <p class="mb-4">Edit: {{$category->name}}</p>
      </header>

      <form method="POST" action="/categorys/{{$category->id}}">
        @csrf
        @method('PUT')
        <div class="mb-6">
          <label for="category" class="inline-block text-lg mb-2">category Name</label>
          <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name"
            value="{{$category->name}}" />

          @error('name')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>

          <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
            Update category
          </button>

          <a href="/categorys" class="text-black ml-4"> Back </a>
        </div>
      </form>
    </x-card>
  </x-admin-layout>
