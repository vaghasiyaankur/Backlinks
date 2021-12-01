<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpotList extends Model
{
    use HasFactory;

    protected $fillable = ['spot','prix','profile_facebook','ref_domain','trust_flow','citation_flow','majestic_flow','keywords'];
}
