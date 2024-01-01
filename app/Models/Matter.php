<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Professor;

class Matter extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    // Matter model
    public function professor()
    {
        return $this->belongsTo(Professor::class)->onDelete('cascade');
    }

}
