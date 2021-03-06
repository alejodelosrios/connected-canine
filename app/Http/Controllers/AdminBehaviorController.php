<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\Behavior;
use Illuminate\Http\Request;


class AdminBehaviorController extends Controller
{
    public function background(Pet $pet)
    {
        return view('admin.behavioral-background', [
            'behaviors_values' => $pet->behavioralBackground()->toArray(),
            'questions' => Behavior::BehavioralBackgroundQuestions(),
            'data' => [
                'pet' => $pet,
                'title' => 'Behavior Background'
            ]
        ]);
    }

    public function separationConfinement(Pet $pet)
    {

        $values = $pet->separationConfinement()->toArray();

        $behaviors_values = [];

        foreach ($values as $behavior) {
            if ($behavior['behavior_id'] == 5) {
                if (strlen($behavior['value']) > 0) {
                    $behaviors_values[0] = explode(',', $behavior['value']);
                }
                if (strlen($behavior['comments']) > 0) {
                    $behaviors_values[1] = $behavior['comments'];
                }
            }

            if ($behavior['behavior_id'] == 6) {
                $behaviors_values[2] = $behavior['value'];
                if (strlen($behavior['comments']) > 0) {
                    $behaviors_values[3] = $behavior['comments'];
                }
            }
        }

        return view('admin.separation-confinement', [
            'behaviors_values' => $behaviors_values,
            'questions' => Behavior::SeparationConfinementQuestions(),
            'data' => [
                'pet' => $pet,
                'title' => 'Separation Confinement'
            ]
        ]);
    }

    public function aggressionFear(Pet $pet)
    {
        $behaviors_values = [];
        if ($pet->hasAggressionFear()) {
            $behaviors = $pet->aggressionFear()->toArray();

            foreach ($behaviors as $behavior) {

                //Fill multiple pption question question22 - #6 on view
                if ($behavior["behavior_id"] == 28) {
                    $values = [];
                    if (strlen($behavior["value"]) > 0) {
                        $values['values'] =  explode(",", $behavior["value"]);
                    }
                    if (strlen($behavior["comments"]) > 0) {
                        $values['comments'] = $behavior["comments"];
                    }

                    $behaviors_values[22] = $values;
                }

                //Fill multiple pption question: question23 - #7 on view
                elseif ($behavior["behavior_id"] == 29) {
                    $values = [];
                    if (strlen($behavior["value"]) > 0) {
                        $values['values'] = explode(",", $behavior["value"]);
                    }
                    if (strlen($behavior["comments"]) > 0) {
                        $values['comments'] = $behavior["comments"];
                    }

                    $behaviors_values[23] = $values;
                    //Fill single question
                } else {

                    $behaviors_values[$behavior["behavior_id"] - 6] = $behavior["value"];
                }
            }
        }


        return view('admin.aggression-fear',  [
            'behaviors_values' => $behaviors_values,
            'questions' => Behavior::AggressionFearQuestions(),
            'data' => [
                'pet' => $pet,
                'title' => 'Aggression Fear'
            ]
        ]);
    }

    public function boardingHistory(Pet $pet)
    {
        $values = $pet->boardingHistory->toArray();
        return view('admin.boarding-history',  [
            'behaviors_values' => $values,
            'attended' => array_key_exists('attended', $values) ? $values['attended'] : false,
            'data' => [
                'pet' => $pet,
                'title' => 'Boarding History'
            ]
        ]);
    }
}
