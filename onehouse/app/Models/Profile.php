<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Psy\VersionUpdater\Checker;

class Profile extends Model
{
    use HasFactory;

    protected $table = 'profiles';
    protected $fillable = [
        'user_id',
    ];

    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function maker()
    {
        return $this->hasMany(Maker::class);
    }

    public function landLog()
    {
        return $this->hasMany(LandLog::class);
    }

    public function checklist_template()
    {
        return $this->hasMany(ChecklistTemplate::class);
    }
    public function checklist_custom()
    {
        return $this->hasMany(checklistCustom::class);
    }

}
