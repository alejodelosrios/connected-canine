<x-guest-layout>
    {{-- <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="card-body">

            <x-jet-validation-errors class="mb-3 rounded-0" />

            @if (session('status'))
                <div class="mb-3 alert alert-success rounded-0" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <x-jet-label value="{{ __('Email') }}" />

                    <x-jet-input class="{{ $errors->has('email') ? 'is-invalid' : '' }}" type="email"
                                 name="email" :value="old('email')" required />
                    <x-jet-input-error for="email"></x-jet-input-error>
                </div>

                <div class="mb-3">
                    <x-jet-label value="{{ __('Password') }}" />

                    <x-jet-input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password"
                                 name="password" required autocomplete="current-password" />
                    <x-jet-input-error for="password"></x-jet-input-error>
                </div>

                <div class="mb-3">
                    <div class="custom-control custom-checkbox">
                        <x-jet-checkbox id="remember_me" name="remember" />
                        <label class="custom-control-label" for="remember_me">
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
            </form>
        </div>
    </x-jet-authentication-card> --}}

    <section class="mb-8 min-vh-100">
        <x-hero-section img="dashboard/img/curved-images/curved14.jpg">
            <x-slot name="title">Welcome!</x-slot>
            <x-slot name="subtitle">
                Use these awesome forms to login or create new account in your
                project for free
            </x-slot>
        </x-hero-section>

        <x-auth-card>
            <x-slot name="title">Login with</x-slot>

            <form role="form text-left">
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Name" aria-label="Name"
                        aria-describedby="email-addon">
                </div>
                <div class="mb-3">
                    <input type="email" class="form-control" placeholder="Email" aria-label="Email"
                        aria-describedby="email-addon">
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" placeholder="Password" aria-label="Password"
                        aria-describedby="password-addon">
                </div>
                <div class="text-left form-check form-check-info">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                    <label class="form-check-label" for="flexCheckDefault">
                        I agree the <a href="javascript:;" class="text-dark font-weight-bolder">Terms
                            and Conditions</a>
                    </label>
                </div>
                <div class="text-center">
                    <button type="button" class="my-4 mb-2 btn bg-gradient-dark w-100">Sign up</button>
                </div>
                <p class="mt-3 mb-0 text-sm">Already have an account? <a href="javascript:;"
                        class="text-dark font-weight-bolder">Sign in</a></p>
            </form>

        </x-auth-card>
    </section>
</x-guest-layout>
