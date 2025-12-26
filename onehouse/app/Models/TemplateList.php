<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateList extends Model
{
    use HasFactory;

    protected $fillable = [
        'phase',
        'list',
    ];

    public $timestamps = true;

    public function ChecklistTemplate()
    {
        return $this->hasMany(ChecklistTemplate::class, 'template_list_id');
    }
}
