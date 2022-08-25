<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function child()
    {
        return $this->hasMany(Family::class, 'parent_id', 'id');
    }

    public function parent()
    {
        return $this->belongsTo(Family::class, 'parent_id', 'id');
    }

    public function grand_child()
    {
        return $this->hasMany(Family::class, 'grand_parent_id', 'id');
    }

    public function grand_parent()
    {
        return $this->belongsTo(Family::class, 'grand_parent_id', 'id');
    }
}
