<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
      <header class="text-center">

      </header>

      <form method="POST" action="/customers" >
        @csrf
        <div class="mb-6">
          <label for="first_name" class="inline-block text-lg mb-2">first Name</label>
          <input type="text" class="border border-gray-200 rounded p-2 w-full" name="first_name"
            value="{{old('first_name')}}"  required />

          @error('first_name')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>

        <div class="mb-6">
          <label for="last_name" class="inline-block text-lg mb-2">Last Name</label>
          <input type="text" class="border border-gray-200 rounded p-2 w-full" required name="last_name"
            placeholder="" value="{{old('last_name')}}" />

          @error('last_name')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>

        <div class="mb-6">
          <label for="address" class="inline-block text-lg mb-2">Address</label>
          <input required type="text" class="border border-gray-200 rounded p-2 w-full" name="address"
            placeholder="Example: Syris, Boston , etc" value="{{old('address')}}" />

          @error('address')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>

        <div class="mb-6">
          <label for="email" required class="inline-block text-lg mb-2">
            Contact Email
          </label>
          <input type="text" placeholder="Example.soso@gmail.com" class="border border-gray-200 rounded p-2 w-full" name="email" value="{{old('email')}}" />

          @error('email')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>

        <div class="mb-6">
          <label for="phone" class="inline-block text-lg mb-2">
            Phone
          </label>
          <input type="text" required class="border border-gray-200 rounded p-2 w-full" name="phone"
            value="{{old('phone')}}" />

          @error('phone')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>
        <div class="mb-6">
            <label for="password" class="inline-block text-lg mb-2">
              Password
            </label>
            <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password"
              value="{{old('password')}}" />

            @error('password')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
          </div>

          <div class="mb-6">
            <label for="password2" class="inline-block text-lg mb-2">
              Confirm Password
            </label>
            <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password_confirmation"
              value="{{old('password_confirmation')}}" />

            @error('password_confirmation')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
          </div>







        <div class="mb-6">
          <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
            Create an account
          </button>

          <a href="/" class="text-black ml-4"> Back </a>
        </div>
      </form>
    </x-card>
  </x-layout>
