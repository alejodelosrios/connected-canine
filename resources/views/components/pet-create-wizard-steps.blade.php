<div class="card p-3 mb-md-6 mb-4 d-flex flex-row align-items-start justify-content-between flex-wrap" x-data="{
        active: {{ $step }},
        checkClass(index) {
            return {
                'bg-primary text-white border-primary' : parseInt(this.active) === parseInt(index),
                'border border-primary text-primary' : parseInt(this.active) != parseInt(index),
            }
        }
    }">

    <x-wizard-step  title="Pet Profile" number="1" :route="route('pet.create', $pet)"/>
    <x-wizard-step  title="Vaccines" number="2" :route="route('pet.vaccines.create', $pet)"/>
    <x-wizard-step  title="Background" number="3" :route="route('pet.background.create', $pet)"/>
    <x-wizard-step  title="Boarding History" number="4" :route="route('pet.boarding.create', $pet)"/>
    <x-wizard-step  title="Separation & Confinement" number="5" :route="route('pet.separation.create', $pet)"/>
    <x-wizard-step  title="Aggression & Fear" number="6" :route="route('pet.aggression.create', $pet)"/>
    <x-wizard-step  title="Vet & Medical" number="7" :route="route('pet.medical.create', $pet)"/>
    <x-wizard-step  title="Process" number="8" :route="route('pet.submit', $pet)"/>
</div>
