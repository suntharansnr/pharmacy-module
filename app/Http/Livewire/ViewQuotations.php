<?php

namespace App\Http\Livewire;

use App\Models\Prescription;
use App\Models\Quotation;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class ViewQuotations extends Component
{
    public $quotation_id;

    public function render()
    {
        $quotation = Quotation::with('drugs')->find($this->quotation_id);
        return view('livewire.view-quotations',compact('quotation'));
    }

    public function updateStatus($status){
        $quotation = Quotation::find($this->quotation_id);
        $quotation->status = $status;
        $quotation->save();

        $prescription = Prescription::find($quotation->prescription_id);
        $owner = User::find($quotation->user_id);

        $data['quotation_id'] = $this->quotation_id;
        $data['owner_name'] = $owner->name;
        $data['status'] = $status;

        try {
            Mail::send('mail.status-updated', $data, function ($message) use ($owner,$status) {
                $message->from('suntharansnr@gmail.com', "assignment");
                $message->to($owner->email);
                $message->subject($status == 1 ? 'Quotation accepted' : 'Quotation rejected');
            });
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
