<x-admin-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
      <header class="text-center">

      </header>

      <form method="POST" action="/users/{{$user->id}}" >
        @csrf
        @method('PUT')
        <div class="mb-6">
          <label for="first_name" class="inline-block text-lg mb-2">first Name</label>
          <input type="text" class="border border-gray-200 rounded p-2 w-full" name="first_name"
            value="{{$user->first_name}}"  required />

          @error('first_name')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>

        <div class="mb-6">
          <label for="last_name" class="inline-block text-lg mb-2">Last Name</label>
          <input type="text" class="border border-gray-200 rounded p-2 w-full" required name="last_name"
            placeholder="" value="{{$user->last_name}}" />

          @error('last_name')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>

        <div class="mb-6">
          <label for="address" class="inline-block text-lg mb-2">Address</label>
          <input required type="text" class="border border-gray-200 rounded p-2 w-full" name="address"
            placeholder="Example: Syris, Boston , etc" value="{{$user->address}}" />

          @error('address')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>

        <div class="mb-6">
          <label for="email" required class="inline-block text-lg mb-2">
            Contact Email
          </label>
          <input type="text" placeholder="Example.soso@gmail.com" class="border border-gray-200 rounded p-2 w-full" name="email" value="{{$user->email}}" />

          @error('email')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>

        <div class="mb-6">
          <label for="phone" class="inline-block text-lg mb-2">
            Phone
          </label>
          <input type="text" required class="border border-gray-200 rounded p-2 w-full" name="phone"
            value="{{$user->phone}}" />

          @error('phone')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>







        <div class="mb-6">
          <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
           Update
          </button>

          <a href="/users" class="text-black ml-4"> Back </a>
        </div>
      </form>
    </x-card>
  </x-admin-layout>
