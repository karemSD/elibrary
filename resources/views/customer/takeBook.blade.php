<x-layout>

    @if (!Auth::check())
      @include('partials._hero')
    @endif
    @include('partials._search2')




    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

      @unless(count($books) == 0)

      @foreach($books as $listing)
      <x-listing-card :listing="$listing" />
      @endforeach

      @else
      <p>No Books found</p>
      @endunless

    </div>


  </x-layout>
