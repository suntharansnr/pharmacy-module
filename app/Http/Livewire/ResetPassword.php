<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use App\Rules\MatchOldPassword;

class ResetPassword extends Component
{
    public $current_password;
    public $password;
    public $confirmPassword;

    public function rules()
    {
        return [
            'current_password' => ['required', new MatchOldPassword],
            'password' => ['required'],
            'confirmPassword' => ['required','same:password'],
        ];
    }

    public function updated($property)
    {
        if (array_key_exists($property, $this->rules())) {
            $this->validateOnly($property);
        }
    }

    public function updatePassword(){
        $this->validate();
        //email notification to admin
        User::find(auth()->user()->id)->update(['password'=> Hash::make($this->password)]);
        $this->reset();

        session()->flash('message', 'Password updated successfully.');
    }

    public function render()
    {
        return view('livewire.reset-password');
    }
}
