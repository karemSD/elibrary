<x-admin-layout>
    <a href="{{route('admin.dashboard')}}" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back
    </a>
    <div class="mx-4">
      <x-card class="p-10">
        <div class="flex flex-col items-center justify-center text-center">
          <img class="w-48 mr-6 mb-6"
          src="{{$listing->pathImage ? asset('images/'.$listing->pathImage) : asset('/images/no-image.png')}}" alt="" />

          <h3 class="text-2xl mb-2">
            {{$listing->title}}
          </h3>
          <div class="text-xl font-bold mb-4">Author : {{$listing->author->name}}</div>
          <ul class="flex">
            <li class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs">
              <a href="">Publisher : {{$listing->publisher->name}}</a>
            </li>

            <li class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs">
                <a href="">Category : {{$listing->category->name}}</a>
              </li>

          </ul>
<br>
  <h3>   published at: {{$listing->publish_year}}</h3>
          <br>
          <div class="border border-gray-200 w-full mb-6"></div>
          <div>
            <h3 class="text-3xl font-bold mb-4">book Description</h3>
            <div class="text-lg space-y-6">
              {{$listing->description}}
@auth('admin')
              <form method="POST" action="/books/{{$listing->id}}">
                @csrf
                @method('DELETE')
                    <a href=""
                        class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80">
                          <button>  <i
                            class="fa-solid fa-remove"></i>   Delete Book</button>
                        </a>
            </form>
              <a href="/books/{{$listing->id}}/edit" target="_blank"
                class="block bg-black text-white py-2 rounded-xl hover:opacity-80"><i class="fa-solid fa-edit"></i>
                Edit Book</a>
            </div>
          </div>
          @else
          <form method="POST" action="">
            @csrf

                <a href="{{ route('customers.create') }}"
                    class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80">
                       <i
                        class="fa-solid fa-shop"></i>   add to Cart
                    </a>
        </form>
          <a href="mailto:saad.karem8642@gmail.com" target="_blank"
            class="block bg-black text-white py-2 rounded-xl hover:opacity-80"><i class="fa-solid fa-edit"></i>
            Contact Us</a>

        </div>
        @endauth
      </x-card>

      {{-- <x-card class="mt-4 p-2 flex space-x-6">
        <a href="/listings/{{$listing->id}}/edit">
          <i class="fa-solid fa-pencil"></i> Edit
        </a>

        <form method="POST" action="/listings/{{$listing->id}}">
          @csrf
          @method('DELETE')
          <button class="text-red-500"><i class="fa-solid fa-trash"></i> Delete</button>
        </form>
      </x-card> --}}
    </div>
  </x-admin-layout>
