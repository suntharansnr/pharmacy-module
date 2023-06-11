<?php

namespace App\Http\Livewire;

use App\Models\Drug;
use App\Models\Prescription;
use App\Models\Quotation;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class QuotationCreate extends Component
{
    public $drug = '';
    public $quantity = '';
    public $total = 0;

    public $i = 0;
    public $rows = [];

    public $prescription_id;

    public $currentImage = '';
    
    public function render()
    {
        $drugs = Drug::pluck('id','name')->toArray();
        $prescription = Prescription::with('medias')->find($this->prescription_id);
        return view('livewire.quotation-create',compact('drugs','prescription'));
    }

    public function rules()
    {
        return [
            'drug' => ['required'],
            'quantity' => ['required','integer','min:1']
        ];
    }

    public function addDrug($i){
        $this->validate();
        $i += 1;
        $this->i = $i;
        $this->rows[$this->i]['name'] = Drug::find($this->drug)->name;
        $this->rows[$this->i]['id'] = $this->drug;
        $this->rows[$this->i]['price'] = Drug::find($this->drug)->price;
        $this->rows[$this->i]['quantity'] = $this->quantity;
        $this->rows[$this->i]['amount'] = Drug::find($this->drug)->price * $this->quantity;
        $this->total += Drug::find($this->drug)->price * $this->quantity;

        //after addition will reset to initial values
        $this->resetAdd();
    }

    public function resetAdd(){
        $this->drug = '';
        $this->quantity = '';
    }

    public function sendQuotation(){
        $quotation = Quotation::create([
            'total' => $this->total,
            'prescription_id' => $this->prescription_id,
            'user_id' => Auth::user()->id
        ]);

        foreach($this->rows as $key => $row){
            DB::table('drug_quotation')->insert([
                'quotation_id' => $quotation->id,
                'drug_id' => $row['id'],
                'quantity' => $row['quantity'],
                'amount' => $row['amount'],
            ]);
        }

        $prescription = Prescription::find($quotation->prescription_id);
        $owner = User::find($prescription->user_id);

        $data['quotation_id'] = $quotation->id;
        $data['owner_name'] = $owner->name;

        try {
            Mail::send('mail.quotation', $data, function ($message) use ($owner) {
                $message->from('suntharansnr@gmail.com', "assignment");
                $message->to($owner->email);
                $message->subject('Quotation received');
            });
        } catch (\Throwable $th) {
            throw $th;
        }

        $this->i = 0;
        $this->total = 0;
        $this->rows = [];
    }
}
