<?php

namespace App\Http\Livewire\Admin;

use App\Models\Account;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;

class Accounts extends Component
{
    public $state = [];

    public $success = false;

    public $unsubscribed = false;

    public $create = false;

    public $search = '';

    public function save()
    {
        $this->create = true;

        Validator::make($this->state, [
            "name" => ["required", "string", "max:255"],
            "domain" => ["required", "string", "regex:/(?:[a-z0-9](?:[a-z0-9-]{0,61}[a-z0-9])?\.)+[a-z0-9][a-z0-9-]{0,61}[a-z0-9]/"],
        ])->validateWithBag("save");

        Account::updateOrCreate(
            ["id" => $this->state["id"] ?? 0],
            [
                "name" => $this->state["name"],
                "domain" => $this->state["domain"],
                "active" => true
            ]
        );

        $this->state = [];
        $this->emit('saved');
        $this->create = false;
    }

    public function delete($id)
    {
        $account = Account::withTrashed()->find($id);

        if ($account->trashed()) {
            $account->restore();
        } else {
            $account->delete();
        }
    }

    public function edit($id)
    {
        $account = Account::withTrashed()->find($id);
        $this->state = [
            'id' => $account->id,
            'name' => $account->name,
            'domain' => $account->domain,
        ];
        $this->create = true;
    }

    public function cancel()
    {
        $this->create = false;
        $this->state = [];
    }

    public function render()
    {
        if ($this->create) {
            return view('livewire.admin.accounts-store');
        }

        return view('livewire.admin.accounts-index', [
            'accounts' => $this->getAccounts()
        ]);
    }

    private function getAccounts()
    {
        if ($this->unsubscribed) {
            return Account::withTrashed()
                ->when($this->search != '', function ($query) {
                    return $query->where('name', 'LIKE', '%' . $this->search)
                        ->orWhere('domain', 'LIKE', '%' . $this->search);
                })->paginate(10);
        }
        return Account::when($this->search != '', function ($query) {
            return $query->where('name', 'LIKE', '%' . $this->search)
                ->orWhere('domain', 'LIKE', '%' . $this->search);
        })->paginate(10);
    }
}
