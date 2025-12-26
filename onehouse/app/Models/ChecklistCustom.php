<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class checklistCustom extends Model
{
    use HasFactory;

    protected $table = 'phase_templates';
    protected $fillable = [
        'number',
        'list',
    ];
     public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
