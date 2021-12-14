<div class="py-5 ">
    <form wire:submit.prevent="sendMessage" role="form text-left" class="py-6 mx-auto col-12 col-md-4">
        <x-jet-action-message on="sent">
            {{ __('Message sent.') }}
        </x-jet-action-message>


        <x-card>
            <h3>Reach Out, We Don’t Bite</h3>

            <div class=" p-2">
                <h6>Email us with any questions or comments. We’re here to help</h6>
                <div class="mb-3 col-12 ">
                    <textarea wire:model.defer="message" name="message" id="message" class="form-control  {{ $errors->has('message') ? 'is-invalid' : '' }}"></textarea>
                    <x-jet-input-error for="message" />
                </div>
            </div>

            <div class="d-flex justify-content-between p-2">
                <a href="{{ route('home') }}" class="btn btn-outline-primary btn-sm">Back</a>
                <button class="btn btn-primary btn-sm">Send Email</button>
            </div>
        </x-card>
    </form>
</div>
