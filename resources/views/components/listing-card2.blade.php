@props(['listing'])

<x-card>
  <div class="flex">
    <img class="hidden w-48 mr-6 md:block"
 src="{{$listing->pathImage ? asset('images/'.$listing->pathImage) : asset('/images/no-image.png')}}"
       alt="wrong path" />
    <div>
      <h3 class="text-2xl">
        <a href="/showBook/{{$listing->id}}">{{$listing->title}} </a>
      </h3>
      <div class="text-xl font-bold mb-4"> ${{$listing->price}}</div>
  <ul class="flex">
    <li class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs">
      <a href="/?tag={{$listing->author->name}}">Author :  {{$listing->author->name}}</a>
    </li>
    <li class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs">
      <a href="/?tag={{$listing->publisher->name}}"> Publisher : {{$listing->publisher->name}}</a>
    </li>
    <li class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs">
      <a href="/?tag={{$listing->category->name}}">  Category :  {{$listing->category->name}}</a>
      </li>
  </ul>
    </div>
  </div>
</x-card>
