<x-guest-layout>
    {{-- <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-3" />

        <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
                @csrf



                <div class="mb-3">
                    <x-jet-label value="{{ __('Email') }}" />

                    <x-jet-input/>

                </div>

                <div class="mb-3">
                    <x-jet-label value="{{ __('Password') }}" />

                    <x-jet-input class="{{ $errors->has('password') ? 'is-invalid' : '' }}" type="password"
                                 name="password" required autocomplete="new-password" />
                    <x-jet-input-error for="password"></x-jet-input-error>
                </div>

                <div class="mb-3">
                    <x-jet-label value="{{ __('Confirm Password') }}" />

                    <x-jet-input class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
                </div>

                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="mb-3">
                        <div class="custom-control custom-checkbox">
                            <x-jet-checkbox id="terms" name="terms" />
                            <label class="custom-control-label" for="terms">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'">'.__('Terms of Service').'</a>',
                                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'">'.__('Privacy Policy').'</a>',
                                    ]) !!}
                            </label>
                        </div>
                    </div>
                @endif

                <div class="mb-0">
                    <div class="d-flex justify-content-end align-items-baseline">
                        <a class="text-muted me-3 text-decoration-none" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>

                        <x-jet-button>
                            {{ __('Register') }}
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
            <x-slot name="title">Register with</x-slot>

            <form method="POST" action="{{ route('register') }}" role="form text-left">
                @csrf
                {{-- NAME INPUT --}}
                <div class="mb-3">
                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name"
                        :value="old('name')" required autofocus autocomplete="name" placeholder="Name" aria-label="Name"
                        aria-describedby="email-addon">
                    <x-jet-input-error for="name"></x-jet-input-error>
                </div>
                {{-- EMAIL INPUT --}}
                <div class="mb-3">
                    <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email"
                        name="email" :value="old('email')" required placeholder="Email" aria-label="Email"
                        aria-describedby="email-addon">
                    <x-jet-input-error for="email"></x-jet-input-error>
                </div>
                {{-- PASSWWORD INPUT --}}
                <div class="mb-3">
                    <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password"
                        name="password" required autocomplete="new-password" placeholder="Password"
                        aria-label="Password" aria-describedby="password-addon">
                    <x-jet-input-error for="password"></x-jet-input-error>
                </div>
                {{-- CONFIRM PASSWORD INPUT --}}
                <div class="mb-3">
                    <input class="form-control" type="password" name="password_confirmation" required
                        autocomplete="new-password" placeholder="Confirm Password" aria-label="Confirm Password"
                        aria-describedby="password-addon">
                    <x-jet-input-error for="password_confirmation"></x-jet-input-error>
                </div>
                {{-- ACCEPT_TERMS --}}
                <div class="text-left form-check form-check-info">
                    <input id="terms" name="terms" class="form-check-input" type="checkbox">
                    <label class="form-check-label" for="terms">
                        I agree the <a href="{{ route('terms.show') }}" class="text-dark font-weight-bolder">Terms
                            and Conditions</a>
                    </label>
                    <x-jet-input-error for="terms"></x-jet-input-error>
                </div>



                <div class="text-center">
                    <button type="submit" class="my-4 mb-2 btn bg-gradient-dark w-100">Sign up</button>
                </div>
                <p class="mt-3 mb-0 text-sm">Already have an account? <a href="{{ route('login') }}"
                        class="text-dark font-weight-bolder">Sign in</a></p>
            </form>

        </x-auth-card>
    </section>
</x-guest-layout>
