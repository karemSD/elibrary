<x-admin-layout>



    @include('partials._search')



    <button class="bg-laravel text-white rounded py-2 px-4 ms-5 hover:bg-black" >
        <a class="add-new" href="{{ route('books.create') }}">Add New book</a>
      </button>
      <br><br>
    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

      @unless(count($books) == 0)

      @foreach($books as $listing)
      <x-listing-card :listing="$listing" />
      @endforeach

      @else
      <p>No Books found</p>
      
      @endunless

    </div>
  </x-admin-layout>


