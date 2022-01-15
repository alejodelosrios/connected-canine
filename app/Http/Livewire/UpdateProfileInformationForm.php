<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateProfileInformationForm extends Component
{
    use WithFileUploads;

    /**
     * The component's state.
     *
     * @var array
     */
    public $state = [];
    public $role;

    protected $listeners = [
        "next" => "updateProfileInformation",
        "save" => "updateProfileInformation",
    ];

    /**
     * Prepare the component.
     *
     * @return void
     */
    public function mount($user)
    {
        $this->role = $user->roleName;
        $this->state = $user->withoutRelations()->toArray();
    }

    /**
     * Update the user's profile information.
     *
     * @param  \Laravel\Fortify\Contracts\UpdatesUserProfileInformation  $updater
     * @return void
     */
    public function updateProfileInformation(
        UpdatesUserProfileInformation $updater
    ) {
        $this->resetErrorBag();

        $updater->update(Auth::user(), $this->state);

        $this->emit("saved");

        $this->emit("refresh-navigation-menu");
    }

    /**
     * Get the current user of the application.
     *
     * @return mixed
     */
    public function getUserProperty()
    {
        return Auth::user();
    }

    /**
     * Render the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view("livewire.update-profile-information-form");
    }

    public function makeUserAdmin()
    {
        $user = User::find($this->state["id"]);
        $user->roles()->toggle(1);
        $this->role = $user->roleName;
    }
}
