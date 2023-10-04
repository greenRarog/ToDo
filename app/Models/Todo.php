<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\Tag;
use Carbon\Carbon;

class Todo extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function owner()
    {
        return $this->hasOne(User::class);
    }

    public function tags()
    {
        return $this->hasMany(Tag::class);
    }

    public function getDateCompliteAttribute($value)
    {          
        $dt = new Carbon($value);          
        return $dt->toFormattedDateString();
    }
}

