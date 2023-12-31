<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

     protected $fillable = ['student_name', 'birth_date', 'city', 'state', 'email', 'whatsapp', 'user_id', 'professor_id', 'status', 'response', 'status_response'];

    // Relação com a tabela Professor
    public function professor()
    {
        return $this->belongsTo(Professor::class, 'professor_id');
    }

    // Relação com a tabela User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Método para obter o status completo (considerando ambos os status)
    public function getStatusAttribute()
    {
        return $this->status_response ?? $this->status;
    }

    // Método para verificar se a mensagem está respondida
    public function isResponded()
    {
        return $this->getStatusAttribute() === 'respondido';
    }
}
