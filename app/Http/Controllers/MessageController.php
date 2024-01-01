<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Professor;

class MessageController extends Controller
{
    protected $professors;

    public function __construct()
    {
        $this->middleware('auth');
        $this->professors = Professor::all();
    }

    public function professorMessages()
    {
        $userMessages = Auth::user()->messages;

        return view('messages.professor', compact('userMessages'));
    }
    
    public function create()
    {
        return view('messages.create', ['professors' => $this->professors]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_name' => 'required',
            'birth_date' => 'required|date',
            'city' => 'required',
            'state' => 'required',
            'email' => 'required|email',
            'whatsapp' => 'required',
            'professor_id' => 'required|exists:professors,id',
        ]);

        // Associe o usuário autenticado à mensagem antes de criar
        $request->merge(['user_id' => Auth::id()]);

        // Adicione a lógica para definir o status como pendente ao criar a mensagem
        $request->merge(['status_response' => 'pendente']);

        // Criação da mensagem e associação automática da matéria através do professor
        $professor = Professor::find($request->input('professor_id'));
        $message = Message::create($request->all());
        $message->update(['matter_id' => $professor->matter_id ?? null]);

        return redirect()->route('messages.create')->with('success', 'Mensagem enviada com sucesso!');
    }


    // Métodos para área logada do professor
    public function index()
    {
        $messages = Message::all();
        return view('messages.index', compact('messages'));
    }

    public function show(Message $message)
    {
        return view('messages.show', compact('message'));
    }

    public function edit(Message $message)
    {
        return view('messages.edit', ['message' => $message, 'professors' => $this->professors]);
    }

        public function update(Request $request, Message $message)
    {
        $request->validate([
            'student_name' => 'required',
            'birth_date' => 'required|date',
            'city' => 'required',
            'state' => 'required',
            'email' => 'required|email',
            'whatsapp' => 'required',
            'professor_id' => 'required|exists:professors,id',
        ]);

        // Atualize apenas os campos específicos e mantenha o status_response
        $message->update($request->only(['student_name', 'birth_date', 'city', 'state', 'email', 'whatsapp', 'professor_id']));

        return redirect()->route('messages.index')->with('success', 'Mensagem atualizada com sucesso!');
    }

    public function markAsResponded(Message $message)
    {
        // Adicione a lógica para marcar a mensagem como respondida
        $message->update(['status_response' => 'respondido']);

        return redirect()->route('messages.index')->with('success', 'Mensagem respondida com sucesso!');
    }



    public function destroy(Message $message)
    {
        $message->delete();

        return redirect()->route('messages.index')->with('success', 'Mensagem excluída com sucesso!');
    }
}

