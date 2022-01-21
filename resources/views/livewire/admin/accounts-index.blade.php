<div>
    <div class="card-header p-0 mx-3 mt-3 z-index-1">
        <div class="d-flex justify-content-between  w-100">
            <h4>Accounts</h4>

            <button type="button" class="btn btn-primary" wire:click="$set('create', true)">
                Create Account
            </button>
        </div>

        <x-jet-action-message on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <div class="d-flex justify-content-between align-items-center  w-100 mt-2">
            <div class="mb-3">
                <label for="search" class="form-label">Search</label>
                <input type="text" class="form-control" id="search" placeholder="search" wire:model.debounce.500ms="search">
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" wire:model="unsubscribed">
                <label class="form-check-label" for="flexCheckDefault">
                    Show unsubscribed
                </label>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table align-items-center mb-0 table-striped ">
            <thead>
                <tr>
                    <th
                        class="d-none d-md-table-cell text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Id</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Name</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Domains
                    </th>
                    <th
                        class="d-none d-md-table-cell text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        State</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($accounts as $account)
                    <tr>
                        <td class="d-none d-md-table-cell align-middle text-center text-sm">
                            <p class="text-xs font-weight-bold mb-0 text-capitalize">{{ $account->id }}</p>
                        </td>
                        <td class="align-middle d-md-table-cell text-center text-sm">
                            <span class="text-xs font-weight-bold text-capitalize">{{ $account->name }}</sp>
                        </td>
                        <td class="align-middle d-md-table-cell text-center">
                            <span class=" text-xs font-weight-bold">{{ $account->domain }}</span>
                        </td>
                        <td class="d-none d-md-table-cell align-middle text-center">
                            @if ($account->trashed())
                                <span class="badge bg-warning">Suspended</span>
                            @else
                                <span class="badge bg-primary">Active</span>
                            @endif
                        </td>
                        <td class="align-middle text-center ">
                            @if ($account->trashed())
                                <a style="cursor:pointer" wire:click="delete({{ $account->id }})"
                                    class="font-weight-bold text-xs" data-toggle="tooltip"
                                    data-original-title="Edit user" data-bs-placement="top" title="Edit pet profile"
                                    data-container="body" data-animation="true">
                                    Restore
                                </a>
                            @else
                                <a style="cursor:pointer" wire:click="delete({{ $account->id }})"
                                    class="font-weight-bold text-xs" data-toggle="tooltip"
                                    data-original-title="Edit user" data-bs-placement="top" title="Edit pet profile"
                                    data-container="body" data-animation="true">
                                    Delete
                                </a>
                            @endif
                            <a style="cursor:pointer" wire:click="edit({{ $account->id }})"
                                class=" font-weight-bold text-xs mx-2" data-toggle="tooltip"
                                data-original-title="Edit user" data-bs-placement="top" title="Edit pet profile"
                                data-container="body" data-animation="true">
                                Edit
                            </a>
                        </td>
                    </tr>
                @empty
                    <td colspan="5" class="p-4">
                        {{ __('There are not Accounts') }}
                    </td>
                @endforelse
            </tbody>
        </table>

        <div class="d-flex justify-content-center mt-4">{{ $accounts->links() }}</div>
    </div>


</div>
