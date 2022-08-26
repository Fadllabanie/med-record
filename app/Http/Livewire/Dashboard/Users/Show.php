<?php

namespace App\Http\Livewire\Dashboard\Users;

use App\Models\User;
use Livewire\Component;

class Show extends Component
{
    public User $user;
    
    public function render()
    {
        return view('livewire.dashboard.users.show');
    }
}
