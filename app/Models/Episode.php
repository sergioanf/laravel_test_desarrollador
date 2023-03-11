<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'episode_id',
        'air_date',
        'created',
        'episode',
        'name'
    ];
    use HasFactory;


    public function characters()
    {
        return $this->belongsToMany(Character::class);
    }

}
