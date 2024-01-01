<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Professor;
use App\Models\Message;
use App\Models\Matter;

class ProfessorController extends Controller
{
    public function index()
    {
        $professors = Professor::with('matter')->get(); // Carrega as matérias associadas aos professores
        $matters = Matter::all(); // Recupera todas as matérias

        return view('professors.index', compact('professors', 'matters'));
    }

    public function create()
    {
        return view('professors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:510',
        ]);

        // Criação do professor e associação automática da matéria
        $professor = Professor::create($request->only('name'));
        $matter = $professor->matter()->create(['name' => $request->input('matter')]);

        return redirect()->route('professors.index')->with('success', 'Professor cadastrado com sucesso!');
    }

    public function destroy(Professor $professor)
    {
        // Exclua manualmente as matérias associadas ao professor
        $professor->matter()->delete();

        // Agora você pode excluir o professor
        $professor->delete();

        return redirect()->route('professors.index')->with('success', 'Professor excluído com sucesso!');
    }

    public function show($professorId, $messageId)
    {
        // Certifique-se de que $professorId e $messageId sejam IDs válidos antes de buscar os modelos
        $professor = Professor::findOrFail($professorId);
        $message = Message::findOrFail($messageId);

        return view('messages.show', compact('message'));
    }

    public function destroyConfirmation(Professor $professor)
    {
        return view('professors.destroy', compact('professor'));
    }

    public function allPendingMessages()
    {
        $messages = Message::where('status_response', 'pendente')->get();
        return view('professors.pending_messages', compact('messages'));
    }

    public function allRespondedMessages()
    {
        $messages = Message::where('status_response', 'respondido')->get();
        return view('professors.responded_messages', compact('messages'));
    }
}
