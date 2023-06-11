<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    use HasFactory;

    protected $guarded;

    public function prescriptions(){
        return $this->belongsToMany(Prescription::class);
    }
}
