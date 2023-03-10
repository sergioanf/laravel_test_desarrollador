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
        'character_id',
        'gender',
        'image',
        'name',
        'species',
        'status',
        'created',
        'location_id',
        'created_at',
        'updated_at'
    ];

    use HasFactory; 

    public function episodes()
    {
        return $this->belongsToMany(Episode::class);
    }

    public function location()
    {
        return $this->hasOne(Location::class);
    }

}
