@props(['listing'])

<x-card>
  <div class="flex">
    <img class="hidden w-48 mr-6 md:block"
 src="{{$listing->pathImage ? asset('images/'.$listing->pathImage) : asset('/images/no-image.png')}}"
       alt="wrong path" />
    <div>
      <h3 class="text-2xl">
        <a href="/books/{{$listing->id}}">{{$listing->title}}</a>
      </h3>
      <div class="text-xl font-bold mb-4"> ${{$listing->price}}</div>
  <ul class="flex">
    <li class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs">
      Author :  {{$listing->author->name}}
    </li>
    <li class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs">
   publisher :  {{$listing->publisher->name}}
    </li>
    <li class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs">
    Category :  {{$listing->category->name}}
      </li>
  </ul>
    </div>
  </div>
</x-card>
