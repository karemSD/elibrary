<x-admin-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
      <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">Create a Book</h2>
        <p class="mb-4">Post a gig to find a developer</p>
      </header>

      <form method="POST" action="/books" enctype="multipart/form-data">
        @csrf
        <div class="mb-6">
          <label for="title" class="inline-block text-lg mb-2">Book Name</label>
          <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title"
            value="{{old('title')}}" required />

          @error('title')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>

        <!-- Example single danger button -->
        <label for="author">Choose an author : </label>

        <select name="author" id="author" required>
            @foreach ($authors as $item)
            <option value="{{$item->name}}"> {{$item->name}} </option>
            @endforeach
        </select>
  <br> <br>
  <label for="publisher">Choose an publisher : </label>

  <select name="publisher" id="publisher" required >
      @foreach ($publishers as $item)
      <option value="{{$item->name}}"> {{$item->name}}  </option>
      @endforeach
  </select>
  <br> <br>
  <label for="category">Choose an category : </label>

  <select name="category" id="category" required>
      @foreach ($categorys as $item)
      <option value="{{$item->name}}"> {{$item->name}}  </option>
      @endforeach
  </select>
  <br> <br>

  <div class="mb-6">
    <label for="picture" class="inline-block text-lg mb-2">
      Book picture
    </label>
    <input type="file" class="border border-gray-200 rounded p-2 w-full" name="picture"required />

    @error('picture')
    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
    @enderror
  </div>
  <div class="mb-6">
    <label for="description" class="inline-block text-lg mb-2" >
      book Description
    </label>
    <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="9"
      placeholder="The Story of book"  required >{{old('description')}}</textarea>

    @error('description')
    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
    @enderror
  </div>

  <div class="mb-6">
    <label for="price" class="inline-block text-lg mb-2">price</label>
    <input type="number" class="border border-gray-200 rounded p-2 w-full" name="price"
      value="{{old('price')}}"  required />

    @error('price')
    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
    @enderror
  </div>
  <div class="mb-6">
    <label for="publish_year" class="inline-block text-lg mb-2">publish year</label>
    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="publish_year"
      value="{{old('publish_year')}}"  required />

    @error('publish_year')
    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
    @enderror
  </div>


        <div class="mb-6">
          <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
            Create Book
          </button>

          <a href="/" class="text-black ml-4"> Back </a>
        </div>
      </form>
    </x-card>

  </x-admin-layout>
