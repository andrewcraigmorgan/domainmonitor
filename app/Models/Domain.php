<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    use HasFactory;

    protected $fillable = ['url', 'is_up', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
