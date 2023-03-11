<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'location_id',
        'name',
        'created',
        'type',
        'name'
    ];

    public $timestamps = false;
    
    use HasFactory;

    public function characters()
    {
        return $this->hasMany(Character::class);
    }
}
 