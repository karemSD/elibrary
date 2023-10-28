<x-mail::message>


Welcome karem in our library

<x-mail::button :url="'http://127.0.0.1:8000/'">
Visit our website to see our new stuff
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
