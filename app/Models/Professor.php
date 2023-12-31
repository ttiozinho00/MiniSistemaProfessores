<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function messages()
    {
        return $this->hasMany(Message::class, 'user_id'); // Alterado para 'user_id'
    }

    public function pendingMessages()
    {
        return $this->messages()->where('status', 'pendente')->get(); // Alterado para 'status'
    }

    public function respondedMessages()
    {
        return $this->messages()->where('status', 'respondido')->get(); // Alterado para 'status'
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
