<div class="py-2">
    <h4>{{ $title }}</h4>
    <div class="py-2 d-flex flex-column flex-md-row flex-md-wrap">

        @if (request()->is('admin/*'))
            <a href="{{ route('admin.user-profile', $user) }}"
                class="mx-1 btn btn-primary btn-sm @if (request()->is('admin/user/profile/*')) active @endif">
                User Profile
            </a>
            <a @if ($user->insurance !== null && $user->insurance->proof !== null)
                    href="{{ route('admin.see-proof-insurance', $user) }}"
                    target="_blank"
                @else
                    data-bs-toggle="tooltip" data-bs-placement="top"
                    title="There are no associated files"
                @endif
                class="mx-1 btn btn-sm
                @if ($user->insurance !== null && $user->insurance->proof === null) btn-secondary @endif
                @if ($user->insurance !== null && $user->insurance->proof !== null) btn-primary @endif
            ">
            Insurance Preview
        </a>
    @else
        <a href="{{ route('user.profile', $user) }}"
            class="mx-1 btn btn-primary btn-sm
            @if (request()->is('participants/profile')) active @endif">
            User Profile
        </a>
        <a href="{{ route('insurance', $user) }}"
            class="mx-1 btn btn-primary btn-sm
            @if (request()->is('participant/profile/*/insurance')) active @endif">
            Insurance
        </a>
        @endif
    </div>
</div>
