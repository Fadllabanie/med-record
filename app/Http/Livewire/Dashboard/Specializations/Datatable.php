<?php

namespace App\Http\Livewire\Dashboard\Specializations;

use App\Models\Specialization;
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

    public function getSpecializationsProperty()
    {
        return Specialization::query()
            ->when($this->searchTerm, function ($query) {
                return $query->whereLike(['name_ar', 'name_en'], $this->searchTerm);
            })
            ->latest('id', 'desc')
            ->paginate();
    }

    public function render()
    {
        return view('livewire.dashboard.specializations.datatable', [
            'specializations' => $this->specializations
        ]);
    }
}
