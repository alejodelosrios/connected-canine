<x-app-layout>
    <div class="p-4">
        <x-card>
            <x-user-details-wrap :user="$user" title="Insurance" />
            @livewire('insurance-form',['user'=>$user])
            <x-slot name="footer">
                @if ($user->insurance === null || $user->insurance->proof === null)
                    <div class="d-flex align-items-baseline justify-content-end">
                        @livewire('save-button', ['redirect_route_name' => route('insurance',$user)])
                    </div>
                @endif
            </x-slot>
        </x-card>
    </div>
</x-app-layout>
