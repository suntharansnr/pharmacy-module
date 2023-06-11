<?php

namespace App\Http\Livewire;

use App\Models\Media;
use App\Models\Prescription;
use App\Models\Slot;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class UserPrescription extends Component
{
    public $note,$delivery_address,$delivery_time;
    use WithFileUploads;
    public $images = [];
    public $selectedSlots = [];

    public function rules()
    {
        return [
            'images.*' => ['required','max:1024'], // 1MB Max
            'images' => 'required|array|max:5', // set maximum number of files to 5
            'note' => ['required'],
            'delivery_address' => ['required'],
            'delivery_time' => ['required'],
            'selectedSlots' => ['required'],
        ];
    }

    protected $validationAttributes = [
        'delivery_time' => 'Delivery date',
        'selectedSlots' => 'Slots',
    ];

    public function render()
    {
        $slots = Slot::pluck('id','name')->toArray();
        return view('livewire.prescription',compact('slots'));
    }

    public function updated($property)
    {
        if (array_key_exists($property, $this->rules())) {
            $this->validateOnly($property);
        }
    }

    public function savePrescription(){
        $this->validate();
        $prescription = Prescription::create([
            'note' => $this->note,
            'delivery_address' => $this->delivery_address,
            'delivery_time' => $this->delivery_time,
            'user_id' => Auth::user()->id
        ]);

        $prescription->slots()->sync($this->selectedSlots);

        foreach ($this->images as $key => $image) {
            $path = $image->store('public/profile');
            $file_path = str_replace('public/', 'storage/', $path);

            Media::create([
                'prescription_id' => $prescription->id,
                'image_path' => $file_path
            ]);
        }

        $this->reset();
    }

    public function removeImg($index)
    {
        array_splice($this->images, $index);
    }
}
