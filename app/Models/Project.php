<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'deadline',
        'status',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $casts = [
        'deadline' => 'date',
    ];

    public function tugas()
    {
        return $this->hasMany(Tugas::class);
    }

}
