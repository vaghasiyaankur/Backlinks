<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;

class ProjectType extends Model
{
    use HasFactory;

    protected $fillable = ['type'];

    public function project()
    {
        $this->belongsTo(Project::class);
    }

}
