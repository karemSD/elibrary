<x-layout>

  <h2 class="text-2xl text-center font-bold my-6 uppercase">
    books of @yield('name')
  </h2>
    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

        @unless(count($books) == 0)

        @foreach($books as $listing)
        <x-listing-card :listing="$listing" />
        @endforeach

        @else
        <p>No Books found</p>
        @endunless

      </div>
      <br><br>
</x-layout>
