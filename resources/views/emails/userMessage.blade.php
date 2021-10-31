@component('mail::message')
    # Hello Admin,

    You have a message from {{ $user->name }} {{ $user->lastname }}

    {{ $message }}

    {{-- @component('mail::button', ['url' => '']) --}}
    {{-- Button Text --}}
    {{-- @endcomponent --}}

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
