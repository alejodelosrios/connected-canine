<x-guest-layout>
    @section('navbar')
        <x-navbar class="py-2 mt-4 shadow blur blur-rounded start-0 end-0" />
    @endsection


    <div class=" py-5">
        <div class=" py-5">
            @if (session()->has('success'))
                <div class="p-2 rounded bg-success">{{ session()->get('success') }}</div>
            @endif
            <div class="my-2 border rounded h-100 h-full d-flex justify-content-center p-5">
                <a href="{{ route('bookings.create') }}" class="col-12 col-md-4 mx-1 border p-3 rounded border-info info">
                    Bookings
                </a>

                <a class="col-12 col-md-4 mx-1 border p-3 rounded">
                    Options 2
                </a>

                <a class="col-12 col-md-4 mx-1 border p-3 rounded">
                    Option 3
                </a>
            </div>
        </div>
    </div>

</x-guest-layout>
