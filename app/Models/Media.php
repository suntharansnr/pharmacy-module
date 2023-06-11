<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $guarded;

    protected $table = 'medias';

    public function prescription(){
        return $this->belongsTo(Prescription::class);
    }
}
