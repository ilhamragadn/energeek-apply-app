<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'phone', 'year'];

    public function jobs()
    {
        return $this->belongsTo(Job::class, 'job_id');
    }

    public function skillSets()
    {
        return $this->belongsToMany(Skill::class, 'skill_sets', 'candidate_id', 'skill_id');
    }
}
