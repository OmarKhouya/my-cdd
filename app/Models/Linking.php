<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Linking extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'linked_user_id', 'accepted'];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function linkedUser()
    {
        return $this->belongsTo(User::class, 'linked_user_id');
    }
}
