<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offers extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'category',
        'availability',
        'partner_id',
    ];
    public function user()
    {
        return $this->belongsToMany(User::class, 'assignments')->withPivot('accepted');
    }
    public function partner()
    {
        return $this->belongsTo(Partner::class);
    }
}
