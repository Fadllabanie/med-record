<?php

namespace App\Http\Livewire\Dashboard\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Datatable extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $searchTerm = null;

    public function clearSearch()
    {
        $this->searchTerm = null;
    }

    public function getUsersProperty()
    {
        return User::query()
            ->when($this->searchTerm, function ($query) {
                return $query->whereLike(['name', 'email', 'doctor.mobile', 'doctor.code'], $this->searchTerm);
            })
           // ->whereNull('role')
            ->with([
                'doctor' => function ($query) {
                    $query->with(['clinic', 'specialization']);
                }
            ])
            ->latest('id', 'desc')
            ->paginate(12);
    }

    public function render()
    {
        return view('livewire.dashboard.users.datatable', [
            'users' => $this->users
        ]);
    }
}
