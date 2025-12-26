<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomList extends Model
{
    use HasFactory;

    protected $fillable = [
        'phase',
        'list',
    ];

    public $timestamps = true;

    public function checklistCustoms()
    {
        return $this->hasMany(ChecklistCustom::class, 'custom_list_id');
    }
}
