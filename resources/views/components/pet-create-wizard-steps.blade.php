<div class="card p-3 mb-md-6 mb-4 d-flex flex-row align-items-start justify-content-center flex-wrap" x-data="{
        active: {{ $step }},
        checkClass(index) {
            return {
                'bg-primary text-white border-primary' : parseInt(this.active) === parseInt(index),
                'border border-primary text-primary' : parseInt(this.active) != parseInt(index),
                'disabled opacity-25' : this.checkDisabled(index),
            }
        },
        checkDisabled(index) {
            step = parseInt('{{ $petStep }}');
            console.log('{{ $petStep }}'=== '{{ \App\Services\UpdatePetWizardStep::COMPLETED }}')

            if (Number.isInteger(step)) {
                return step +1  < parseInt(index)
            }
            return '{{ $petStep }}' !== '{{ \App\Services\UpdatePetWizardStep::COMPLETED }}'
        }
    }">

    <x-wizard-step maxStep="{{ $petStep }}" title="Pet Profile" number="1" :route="route('pet.create', $pet)" />
    <x-wizard-step maxStep="{{ $petStep }}" title="Vaccines" number="2"
        :route="route('pet.vaccines.create', $pet)" />
    <x-wizard-step maxStep="{{ $petStep }}" title="Background" number="3"
        :route="route('pet.background.create', $pet)" />
    <x-wizard-step maxStep="{{ $petStep }}" title="Boarding History" number="4"
        :route="route('pet.boarding.create', $pet)" />
    <x-wizard-step maxStep="{{ $petStep }}" title="Separation & Confinement" number="5"
        :route="route('pet.separation.create', $pet)" />
    <x-wizard-step maxStep="{{ $petStep }}" title="Aggression & Fear" number="6"
        :route="route('pet.aggression.create', $pet)" />
    <x-wizard-step maxStep="{{ $petStep }}" title="Vet & Medical" number="7"
        :route="route('pet.medical.create', $pet)" />
    <x-wizard-step maxStep="{{ $petStep }}" title="Process" number="8" :route="route('pet.submit', $pet)" />
</div>
