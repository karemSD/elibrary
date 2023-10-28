<x-layout>
    <a href="/" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back
    </a>
    <div class="mx-4">
      <x-card class="p-10">
        <div class="flex flex-col items-left justify-left text-left">
          <h3 class="text-2xl  h4 pb-2 mb-4  border-bottom border-danger">
     <span class="text-danger" >  Name : </span>   {{$listing->first_name}} {{$listing->last_name}}
          </h3>


          <h3 class="text-2xl h4 pb-2 mb-4  border-bottom border-danger ">
            <span class="text-danger">Address :</span> {{$listing->address}}
              </h3>

              <h3 class="text-2xl  h4 pb-2 mb-4  border-bottom border-danger">
                <span class="text-danger" > Email :</span>  {{$listing->email}}
                  </h3>
                  <h3 class="text-2xl h4 pb-2 mb-4 border-bottom border-danger">
                    <span class="text-danger" >   phone :</span> {{$listing->phone}}
                      </h3>
                      <div class="text-xl font-bold mb-4"></div>
          <br>
          <div class="border border-gray-200 w-full mb-6"></div>
          <div>

            <div class="text-lg space-y-6">
              <form method="POST" action="/customers/{{$listing->id}}">
                @csrf
                @method('DELETE')
                          <button  class="block bg-laravel text-white mt-6 py-2 px-2 rounded-xl hover:opacity-80">  <i
                            class="fa-solid fa-remove"></i> Delete customer</button>
            </form>
            <br>
              <a href="/customers/{{$listing->id}}/edit" target="_blank"
                class=" bg-black text-white  py-2 px-2 mt-6 rounded-xl hover:opacity-80"><i class="fa-solid fa-edit"></i>
                Edit customer</a>
            </div>
          </div>

        </div>
      </x-card>


    </div>
  </x-layout>



  {{-- /customers/{{$listing->id}}/edit --}}
  {{-- /books/{{$listing->id}}       //de --}}
