<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;

class ProjectMonth extends Model
{
    use HasFactory;

    protected $fillable = ['months', 'project_id'];

    public function projectType()
    {
        return $this->hasOne(Project::class);
    }
}
