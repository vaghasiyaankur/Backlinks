<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProjectType;
use App\Models\ProjectData;
use App\Models\ProjectMonth;

class Project extends Model
{
    use HasFactory;

    // protected $fillable = ['name', 'website','email','month','price', 'project_type_id','project_type_checkbox', 'begining_month'];
     protected $guarded = ['id'];

    public function projectType()
    {
        return $this->hasOne(ProjectType::class);
    }

    public function project()
    {
        $this->hasMany(ProjectData::class);
    }

    public function projectMonths()
    {
        return $this->hasOne(ProjectMonth::class);
    }
    
}
