<?php

namespace App\Http\Livewire;

use App\Models\Prescription;
use Livewire\Component;

class Prescriptions extends Component
{
    public function render()
    {
        $prescriptions = Prescription::get();
        return view('livewire.prescriptions',compact('prescriptions'));
    }
}
