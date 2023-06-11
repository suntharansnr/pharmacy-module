<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;

    protected $guarded;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function quotations(){
        return $this->hasMany(Quotation::class);
    }

    public function medias(){
        return $this->hasMany(Media::class);
    }

    public function slots(){
        return $this->belongsToMany(Slot::class);
    }
}
