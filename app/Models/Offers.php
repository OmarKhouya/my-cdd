<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offers extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsToMany(User::class, 'assignements');
    }
    public function partner()
    {
        return $this->belongsTo(Partner::class);
    }
}
