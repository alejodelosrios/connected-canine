<?php

namespace App\Http\Livewire;

use App\Models\Pet;
use Livewire\Component;
use App\Models\Behavior;
use Illuminate\Support\Facades\Validator;

class AggressionFearForm extends Component
{
    public $state = [
        "question22" => ["value" => [], "comments" => ""],
        "question23" => ["value" => [], "comments" => ""],
    ];

    protected $messages = [
        'question24.required' => 'Please enter a number',
        'question25.required' => 'Please enter a number'
    ];

    public $pet;

    protected $listeners = [
        "save" => "save",
    ];

    public function mount(Pet $pet)
    {
        $this->pet = $pet;
        
        if ($pet->hasAggressionFear()) {
            $behaviors = $pet->aggressionFear()->toArray();

            foreach ($behaviors as $behavior) {
                //Fill multiple pption question question22 - #6 on view
                if ($behavior["behavior_id"] == 28) {
                    if (strlen($behavior["value"]) > 0) {
                        $this->state["question22"]["value"] = explode(
                            ",",
                            $behavior["value"]
                        );
                    }
                    if (strlen($behavior["comments"]) > 0) {
                        $this->state["question22"]["comments"] =
                            $behavior["comments"];
                    }
                }
                //Fill multiple pption question: question23 - #7 on view
                elseif ($behavior["behavior_id"] == 29) {
                    if (strlen($behavior["value"]) > 0) {
                        $this->state["question23"]["value"] = explode(
                            ",",
                            $behavior["value"]
                        );
                    }
                    if (strlen($behavior["comments"]) > 0) {
                        $this->state["question23"]["comments"] =
                            $behavior["comments"];
                    }
                } else {
                    //Fill single question
                    $key = "question" . ($behavior["behavior_id"] - 6);
                    $this->state[$key] = $behavior["value"];
                }
            }
        }
    }

    public function save()
    {
        $this->resetErrorBag();

        //Validate
        $validate = Validator::make(
            $this->state,
            $this->rules(),
            $this->messages,
            $this->customAttributes()
        )->validateWithBag("save");

        //Fill signle questions
        for ($id = 1; $id < 26; $id++) {
            //Is not a multiple selection questions
            if ($id != 22 && $id != 23) {
                if (array_key_exists("question" . $id, $this->state)) {
                    $answers[$id + 6] = [
                        "value" => $this->state["question" . $id]
                    ];
                }
            }
        }

        //Fill Multiple options questions
        if (
            count($this->state["question22"]["value"]) > 0 ||
            strlen($this->state["question22"]["comments"]) > 0
        ) {
            $answers[28] = [
                "value" => implode(",", $this->state["question22"]["value"]),
                "comments" => $this->state["question22"]["comments"],
            ];
        } else {
            $this->pet->behaviors()->detach(28);
        }

        if (
            count($this->state["question23"]["value"]) > 0 ||
            strlen($this->state["question23"]["comments"]) > 0
        ) {
            $answers[29] = [
                "value" => implode(",", $this->state["question23"]["value"]),
                "comments" => $this->state["question23"]["comments"],
            ];
        } else {
            $this->pet->behaviors()->detach(29);
        }

        //Save data
        $this->pet->behaviors()->syncWithoutDetaching($answers);

        $this->emit("saved", ["pet_id" => $this->pet->id]);

        $this->emit("refresh-navigation-menu");
    }

    public function render()
    {
        return view("livewire.aggression-fear-form", [
            "questions" => Behavior::AggressionFearQuestions(),
        ]);
    }

    protected function rules()
    {
        return [
            "question1" => ["required"],
            "question2" => ["required"],
            "question3" => ["required"],
            "question4" => ["required"],

            "question6" => ["required"],
            "question7" => ["required"],
            "question8" => ["required"],
            "question9" => ["required"],
            "question10" => ["required"],
            "question11" => ["required"],

            "question13" => ["required"],
            "question14" => ["required"],
            "question15" => ["required"],
            "question16" => ["required"],
            "question17" => ["required"],
            "question18" => ["required"],
            "question19" => ["required"],
            "question20" => ["required"],
            "question21" => ["required"],
            "question22.value" => ["nullable", "array"],
            "question22.comments" => ["nullable", "string"],
            "question23.value" => ["nullable", "array"],
            "question23.comments" => ["nullable", "string"],
            "question24" => ["required", "numeric", "min:0"],
            "question25" => ["required", "numeric", "min:0"],
        ];
    }

    protected function customAttributes()
    {
        return [
            "question1" => "question",
            "question2" => "question",
            "question3" => "question",
            "question4" => "question",

            "question6" => "question",
            "question7" => "question",
            "question8" => "question",
            "question9" => "question",
            "question10" => "question",
            "question11" => "question",

            "question13" => "question",
            "question14" => "question",
            "question15" => "question",
            "question16" => "question",
            "question17" => "question",
            "question18" => "question",
            "question19" => "question",
            "question20" => "question",
            "question21" => "question",
            "question22.value" => "question",
            "question22.comments" => "question",
            "question23.value" => "question",
            "question23.comments" => "question",
            "question24" => "answer",
            "question25" => "answer",
        ];
    }
}
