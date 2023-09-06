<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    // protected $fillable = ['title', 'description'];

    protected $guarded = [];

    public function scopePublic(Builder $query): Builder
    {
        return $query->where('public', true);
    }
}
