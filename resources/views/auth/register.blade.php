<x-guest-layout>
    <section class="mb-8 min-vh-100">
        <x-hero-section img="/img/jack-russel-staring-at-laptop.jpg">
            <x-slot name="title">Welcome!</x-slot>
            <x-slot name="subtitle">
                {{-- Use these awesome forms to login or create new account in your --}}
                {{-- project for free --}}
            </x-slot>
        </x-hero-section>

        <x-auth-card>
            <x-slot name="title">Register</x-slot>

            <form method="POST" action="{{ route('register') }}" role="form text-left">
                @csrf
                {{-- FIRSTNAME INPUT --}}
                <div class="mb-3">
                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name"
                        :value="old('name')" required autofocus autocomplete="name" placeholder="First name"
                        aria-label="First name" aria-describedby="firstname-addon">
                    <x-jet-input-error for="name"></x-jet-input-error>
                </div>
                {{-- LASTNAME INPUT --}}
                <div class="mb-3">
                    <input class="form-control {{ $errors->has('lastname') ? 'is-invalid' : '' }}" type="text"
                        name="lastname" :value="old('lastname')" required autofocus autocomplete="lastname"
                        placeholder="Last name" aria-label="Last name" aria-describedby="lastname-addon">
                    <x-jet-input-error for="lastname"></x-jet-input-error>
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
                        I agree to the <a href="{{ route('terms.show') }}" class="text-dark font-weight-bolder">Terms
                            of Use</a> and <a href="{{ route('policy.show') }}"
                            class="text-dark font-weight-bolder">Privacy Policy</a>
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
