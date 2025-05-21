<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'surname', 'address', 'phone', 'city_id'];

    // Susiejimas su miestu
    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
