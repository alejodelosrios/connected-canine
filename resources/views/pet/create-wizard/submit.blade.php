<x-app-layout>
    <div class="p-4">
        <x-pet-create-wizard-steps :step="$step" />

        <x-card>
            <div class="p-4">

                <h4>Application Process – An Overview</h4>
                <p class="mb-6"><b>An Easy, Two-Step Process</b></p>

                <p class="d-flex align-items-center">
                    <span class="border rounded-circle d-flex justify-content-center align-items-center me-3"
                        style="height: 30px; width: 30px;">1</span>
                    <b>Online Questionnaire</b>
                </p>
                <div class="ps-5">
                    <p>Tell us about your dog</p>
                    <p>Our website will guide you through a questionnaire that asks about your dog’s health and typical
                        behavior. Additionally, you’ll be given instructions on uploading proof of vaccinees and
                        liability
                        coverage that protects you in case your dog is involved in an altercation.</p>
                    <p>The questionnaire takes about 20 minutes to complete. </p>
                    <p>After you click submit, our veterinarian will review your responses and within a few days we’ll
                        contact
                        you and schedule an onsite behavior assessment. </p>
                </div>

                <p class="d-flex align-items-center">
                    <span class="border rounded-circle d-flex justify-content-center align-items-center me-3"
                        style="height: 30px; width: 30px;">2</span>
                    <b>Onsite Behavior Assessment</b>
                </p>

                <div class="ps-5 mb-6">
                    <p>Ensure your dog’s good manners at home transfer to the office.</p>
                    <p>We’ll meet you and your dog in your office to get a better understanding of your dog’s comfort
                        level
                        with
                        others in a workplace environment. With the aid of a standardized test, we will introduce common
                        workplace stimuli and observe your dog’s response.</p>
                    <p>The onsite behavior assessment takes around 20 minutes to complete. Once complete, our
                        veterinarian
                        will
                        review the results with your leadership team. Within a few days we’ll contact you. </p>
                </div>


                <p><b>You’re All Set!</b></p>
                <p>Once approved, you can begin enjoying the office with your pup. It’s that easy! </p>


                <p><b>Reach out anytime with questions/comments.</b></p>
                <span>info@connectedcanine.com</span>

            </div>

            <x-slot name="footer">
                <div class="d-flex align-items-baseline justify-content-end">
                    <a href="{{ $redirectBack }}" class="mx-2 btn btn-secondary">
                        {{ __('Back') }}
                    </a>

                    <a href="{{ $redirecTo }}" class=" btn btn-primary">
                        {{ __('Next') }}
                    </a>
                </div>
            </x-slot>
        </x-card>
    </div>
</x-app-layout>
