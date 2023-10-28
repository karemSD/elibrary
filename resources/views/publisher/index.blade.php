<x-admin-layout>
    <x-card class="p-10">
      <header>
        <h1 class="text-3xl text-center font-bold my-6 uppercase">
          Manage publishers
        </h1>
      </header>

      <table class="w-full table-auto rounded-sm">
        <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black" >
            <a class="add-new" href="{{ route('publishers.create') }}">Add publisher</a>
          </button>
        <tbody>
          @unless($publishers->isEmpty())
          @foreach($publishers as $listing)
          <tr class="border-gray-300">
            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
              <a href="/publishers/{{$listing->id}}">
               {{$listing->name}}
              </a>
            </td>
            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
              <a href="/publishers/{{$listing->id}}/edit" class="text-blue-400 px-6 py-2 rounded-xl"><i
                  class="fa-solid fa-pen-to-square"></i>
                Edit</a>
            </td>
            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
              <form method="POST" action="/publishers/{{$listing->id}}">
                @csrf
                @method('DELETE')
                <button class="text-red-500"><i class="fa-solid fa-trash"></i> Delete</button>
              </form>
            </td>
          </tr>
          @endforeach
          @else
          <tr class="border-gray-300">
            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
              <p class="text-center">No publishers Found</p>
            </td>
          </tr>
          @endunless

        </tbody>
      </table>

    </x-card>
    <br>



  </x-admin-layout>
