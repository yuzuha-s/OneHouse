<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChecklistCustom extends Model
{
    use HasFactory;

    protected $table = 'checklist_customs';
    protected $fillable = [
        'profile_id',
        'custom_list_id',
        'checked',
    ];
    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
    public function customList() {
        return $this->belongsTo(CustomList::class);
    }
}
