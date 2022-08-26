<?php

namespace App\Http\Livewire\Dashboard\Specializations;

use Livewire\Component;
use App\Models\Specialization;
use Illuminate\Validation\Rule;

class Update extends Component
{
    public Specialization $specialization;

    public function rules()
    {
        return [
            'specialization.name_ar' => ['required', 'string', 'min:3', 'max:50', Rule::unique('specializations', 'name_ar')->ignore($this->specialization->id)],
            'specialization.name_en' => ['required', 'string', 'min:3', 'max:50', Rule::unique('specializations', 'name_en')->ignore($this->specialization->id)],
            'specialization.active' => ['required', Rule::in([0, 1])]
        ];
    }

    public function update()
    {
        $this->specialization->update($this->validate());

        $this->dispatchBrowserEvent('alert', ['message' => 'Specialization updated successfully!']);
    }

    public function render()
    {
        return view('livewire.dashboard.specializations.update');
    }
}
