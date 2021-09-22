<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;

class ProjectData extends Model
{
    use HasFactory;

    protected $fillable = ['url', 'ancre','url_spot','prestataire','price', 'month', 'project_id'];

    public function projectType()
    {
        return $this->hasOne(Project::class);
    }
}
