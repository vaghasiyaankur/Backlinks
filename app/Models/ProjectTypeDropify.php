<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectTypeDropify extends Model
{
    use HasFactory;
    protected $fillable = ['project_type','project_file','project_id'];
}
