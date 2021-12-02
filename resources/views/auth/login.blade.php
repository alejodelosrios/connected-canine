<x-guest-layout>

    <section class="mb-8 min-vh-100">
        <x-hero-section img="img/jack-russel-staring-at-laptop.jpg">
            <x-slot name="title">Welcome!</x-slot>
            <x-slot name="subtitle">
            </x-slot>
        </x-hero-section>

        <x-auth-card>
            <x-slot name="title">Login with</x-slot>

            <x-jet-validation-errors class="mb-3 rounded-0" />

            @if (session('status'))
                <div class="mb-3 alert alert-success rounded-0" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <x-jet-input class="{{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email"
                        :value="old('email')" placeholder="Email" required />
                    <x-jet-input-error for="email"></x-jet-input-error>
                </div>

                <div class="mb-3">
                    <x-jet-input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                        type="password" name="password" required autocomplete="current-password"  placeholder="Password"/>
                    <x-jet-input-error for="password"></x-jet-input-error>
                </div>

                <div class="mb-3">
                    <div class="form-check form-check-info">
                        <input class="form-check-input" type="checkbox" value="" id="remember" name="remember" checked>
                        <label class="form-check-label" for="remember_me">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>

                <div class="mb-0">
                    <div class="d-flex justify-content-end align-items-baseline">
                        @if (Route::has('password.request'))
                            <a class="text-muted me-3" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif

                        <x-jet-button>
                            {{ __('Log in') }}
                        </x-jet-button>
                    </div>
                </div>
                <p class="w-full mt-3 mb-0 text-sm d-flex justify-content-center">Don't you have an account? <a
                        href="{{ route('register') }}" class="text-dark font-weight-bolder">Sign Up</a></p>

            </form>
            {{-- <button type="button" class="btn btn-primary" id="liveToastBtn">Show live toast</button> --}}

            {{-- <div class="bottom-0 p-3 position-fixed end-0" style="z-index: 11"> --}}
            {{-- <div id="liveToast" class="toast" role="alert" aria-live="assertive" ria-atomic="true"> --}}
            {{-- <div class="toast-header"> --}}
            {{-- <img src="..." class="rounded me-2" lt="..."> --}}
            {{-- <strong class="me-auto">Bootstrap</strong> --}}
            {{-- <small>11 minsgo</small> --}}
            {{-- <button type="button" class="btn-close" data-bs-dismiss="toast" ria-label="Close"></button> --}}
            {{-- </div> --}}
            {{-- <div class="toast-body"> --}}
            {{-- Hello, world! This is toast message. --}}
            {{-- </div> --}}
            {{-- </div> --}}
            {{-- </div> --}}

        </x-auth-card>
    </section>
    @push('scripts')
        <script charset="utf-8">
            var option = {
                animation: true,
                delay: 2000
            }
            document.getelementbyid("livetoastbtn").onclick = function() {
                var mynotification = document.getelementbyid("livetoast");
                var bsnotification = new bootstrap.toast(mynotification, options);
                bsnotification.show();
            }
        </script>
    @endpush
</x-guest-layout>
