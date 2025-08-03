<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    protected $fillable = [
        'project_id',
        'title',
        'description',
        'deadline',
        'status',
        'file_path'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    protected $casts = [
        'deadline' => 'date',
    ];
}
