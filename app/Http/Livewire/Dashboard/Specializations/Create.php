<?php

namespace App\Http\Livewire\Dashboard\Specializations;

use App\Models\Specialization;
use Livewire\Component;
use Illuminate\Validation\Rule;

class Create extends Component
{
    public $name_ar;
    public $name_en;
    public $active;

    public function rules()
    {
        return [
            'name_ar' => ['required', 'string', 'min:3', 'max:50', Rule::unique('specializations', 'name_ar')],
            'name_en' => ['required', 'string', 'min:3','max:50', Rule::unique('specializations', 'name_en')],
            'active' => ['required', Rule::in([0, 1])]
        ];
    }

    public function store()
    {
        Specialization::create($this->validate());

        $this->dispatchBrowserEvent('alert', ['message' => 'Specialization created successfully!']);
    }

    public function render()
    {
        return view('livewire.dashboard.specializations.create');
    }
}
