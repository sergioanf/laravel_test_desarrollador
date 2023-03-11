<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'gender',
        'image',
        'name',
        'species',
        'status',
        'created',
        'location_id'
    ];

    public $timestamps = false;
    
    use HasFactory; 

    public function episodes()
    {
        return $this->belongsToMany(Episode::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

}
