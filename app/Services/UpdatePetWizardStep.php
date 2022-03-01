<?php

namespace App\Services;

use App\Models\Pet;

final class UpdatePetWizardStep
{
    const COMPLETED = 'completed';

    public static function pushStep(Pet $pet, $step)
    {
        if ($pet->step === static::COMPLETED) {
            return;
        }

        if ($pet->step < $step || $step === static::COMPLETED) {
            $pet->forceFill(['step' => $step])->save();
        }
    }
}
