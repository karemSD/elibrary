
  <x-admin-layout>

    <x-card class="p-10">
      <header>
        <h1 class="text-3xl text-center font-bold my-6 uppercase">
          Manage Customers
          (Order By Borrowing times )
        </h1>

      </header>


      <table class="w-full table-auto rounded-sm">

        <tbody>

          <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black" >
            <a class="add-new" href="{{ route('users.create') }}">Add Customer</a>
          </button>
          <br><br>
          <button class="bg-primary text-white rounded py-2 px-4 hover:bg-black" >
            <a class="add-new" href="/sendmail">notfic customers</a>
          </button>

          @unless($users->isEmpty())
          @foreach($users as $listing)
          <tr class="border-gray-300">
            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                <a href="/users/{{$listing->id}}">
                {{$listing->first_name}}  {{$listing->last_name}}
                </a>

            </td>
            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
              <a href="/users/{{$listing->id}}/edit" class="text-blue-400 px-6 py-2 rounded-xl"><i
                  class="fa-solid fa-pen-to-square"></i>
                Edit</a>
            </td>
            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
              <form method="POST" action="/users/{{$listing->id}}">
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



  </x-admin-layout>
