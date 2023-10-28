<x-layout>

    <x-card class="p-10">
      <header>
        <h1 class="text-3xl text-center font-bold my-6 uppercase">
          Manage Customers
        </h1>

      </header>


      <table class="w-full table-auto rounded-sm">
        <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black" >
            <a class="add-new" href="{{ route('customers.create') }}">Add customer</a>
          </button>
        <tbody>
          @unless($customers->isEmpty())
          @foreach($customers as $listing)
          <tr class="border-gray-300">
            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                <a href="/customers/{{$listing->id}}">
                {{$listing->first_name}}  {{$listing->last_name}}
                </a>
            </td>
            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
              <a href="/customers/{{$listing->id}}/edit" class="text-blue-400 px-6 py-2 rounded-xl"><i
                  class="fa-solid fa-pen-to-square"></i>
                Edit</a>
            </td>
            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
              <form method="POST" action="/customers/{{$listing->id}}">
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
              <p class="text-center">No customers Found</p>
            </td>
          </tr>
          @endunless

        </tbody>
      </table>

    </x-card>
    <br>



  </x-layout>
