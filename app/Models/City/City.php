<?php

namespace App\Models\City;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $table = 'cities';
    protected $fillable = ['name', 'population', 'price', 'nbDays', 'description', 'country-id'];

    public $timestamps = true;
}
