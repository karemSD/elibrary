<x-mail::message>

<h2>Hi {{$name}}</h2>
Visit our website to see our new stuff


<x-mail::button :url="'http://127.0.0.1:8000/'">
Button Text
</x-mail::button>
<x-mail::panel>
    sfdskdlskdls
</x-mail::panel>
Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
