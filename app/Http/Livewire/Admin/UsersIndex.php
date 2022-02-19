<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class UsersIndex extends Component
{
    public function render()
    {
        $users = User::paginate(8);
        return view("livewire.admin.users-index", compact("users"));
    }
}
