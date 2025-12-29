<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChecklistTemplate extends Model
{
    use HasFactory;

    protected $table = 'checklist_templates';

    protected $fillable = [
        'profile_id',
        'template_list_id',
        'checked',
    ];
    protected $casts = [
        'checked' => 'boolean',
    ];

    public $timestamps = true;

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
    public function templateList()
    {
        return $this->belongsTo(TemplateList::class, 'template_list_id');
    }
}
