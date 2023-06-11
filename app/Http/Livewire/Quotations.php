<?php

namespace App\Http\Livewire;

use App\Models\Prescription;
use App\Models\Quotation;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Quotations extends Component
{
    public function render()
    {
        $my_prescription_ids = Prescription::where('user_id',Auth::user()->id)->pluck('id')->toArray();
        $quotations = Quotation::whereIn('prescription_id',$my_prescription_ids)->get();
        return view('livewire.quotations',compact('quotations'));
    }
}
