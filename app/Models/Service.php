<?php

namespace App\Models;

use App\Models\Appointment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    // protected $fillable = ['title','short_des','long_des','image'];
    protected $guarded = [];

    public function appointments()
    {
        return $this->belongsToMany(Appointment::class)->withTimestamps();
    }
}
