<x-app-layout>
    <x-card>
        <x-pet-details-wrap :pet="$pet" title="Pet Vaccines" />
        <div class="table-responsive">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Vaccine</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Expiration Date</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($pet->vaccines)
                        <tr>
                            @if ($pet->vaccines->rabies)
                                <td class="align-middle text-sm">
                                    <p class="ps-3 text-xs font-weight-bold mb-0 text-capitalize">Rabies</p>
                                </td>
                                <td class="align-middle text-center text-sm">
                                    <p class="text-xs font-weight-bold mb-0 text-capitalize">
                                        {{ $pet->vaccines->rabies->format('m/d/Y') }}</p>
                                </td>
                            @endif
                        </tr>
                        <tr>
                            @if ($pet->vaccines->bordetella)
                                <td class="align-middle  text-sm">
                                    <p class="ps-3 text-xs font-weight-bold mb-0 text-capitalize">Bordetella</p>
                                </td>
                                <td class="align-middle text-center text-sm">
                                    <p class="text-xs font-weight-bold mb-0 text-capitalize">
                                        {{ $pet->vaccines->bordetella->format('m/d/Y') }}</p>
                                </td>
                            @endif
                        </tr>
                        <tr>
                            @if ($pet->vaccines->dhhp)
                                <td class="align-middle  text-sm">
                                    <p class="ps-3 text-xs font-weight-bold mb-0 text-capitalize">DHHP</p>
                                </td>
                                <td class="align-middle text-center text-sm">
                                    <p class="text-xs font-weight-bold mb-0 text-capitalize">
                                        {{ $pet->vaccines->dhhp->format('m/d/Y') }}</p>
                                </td>
                            @endif
                        </tr>
                    @else
                        <td colspan="5" class="p-4">
                            {{ __('There are not vaccines for this pet') }}
                        </td>
                    @endif
                </tbody>
            </table>

            <h5 class="mt-4">Proof</h5>
            @if ($pet->vaccines->proof)
                <div class="mt-2  mb-4 d-flex align-items-start">
                    <div class="p-2 border rounded">
                        <a href="{{ route('vaccine-proof', $pet) }}">View document</a>
                    </div>
                </div>
            @else
                <p>There is not proof uploaded</p>
            @endif

        </div>
    </x-card>
</x-app-layout>
