<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Matter;


class Professor extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'matter_id']; // Atualizado para incluir 'matter_id'

    public function matter()
    {
        return $this->hasOne(Matter::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class, 'user_id');
    }

    public function pendingMessages()
    {
        return $this->messages()->where('status', 'pendente')->get();
    }

    public function respondedMessages()
    {
        return $this->messages()->where('status', 'respondido')->get();
    }

    public function hasPendingMessages()
    {
        return $this->pendingMessages()->isNotEmpty();
    }

    public function hasRespondedMessages()
    {
        return $this->respondedMessages()->isNotEmpty();
    }
}
