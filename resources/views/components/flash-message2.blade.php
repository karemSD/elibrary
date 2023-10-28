@if(session()->has('message2'))
<div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show"
  class="fixed top-0 left-1/2 transform -translate-x-1/2 bg-primary text-white px-48 py-3">
  <p>
    {{session('message2')}}
  </p>
</div>
@endif
