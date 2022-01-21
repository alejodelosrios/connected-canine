<x-app-layout>
    <div class="p-4">
        <x-card>

            <x-user-details-wrap :user="$user" title="User Profile"/>
            @livewire('update-profile-information-form', [ "user" => $user ])
            <x-slot name="footer">
                <div class="d-flex align-items-baseline justify-content-end">
                    @livewire('save-button', ['redirect_route_name' => route('user.profile')])
                </div>
            </x-slot>
        </x-card>
    </div>
</x-app-layout>
