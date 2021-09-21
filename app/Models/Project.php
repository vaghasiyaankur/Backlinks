<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProjectType;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'website','email','month','price', 'project_type_id'];

    public function projectType()
    {
        return $this->hasOne(ProjectType::class);
    }
    
}
