@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8">
        <h2 class="text-3xl font-bold mb-4">Lista de Mensagens</h2>
        <div class="table-responsive">
            <table class="table-auto w-full border-collapse border">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2">Nome do Aluno</th>
                        <th class="px-4 py-2">Data</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($messages as $message)
                        <tr>
                            <td class="border px-4 py-2">{{ $message->student_name }}</td>
                            <td class="border px-4 py-2">{{ $message->created_at->format('d/m/Y') }}</td>
                            <td class="border px-4 py-2">{{ $message->status }}</td>
                            <td class="border px-4 py-2">
                                <a href="{{ route('professors.messages.show', ['professor' => $message->professor_id, 'message' => $message->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline-blue mr-2">Ver</a>
                                <a href="{{ route('messages.edit', $message->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline-yellow mr-2">Editar</a>
                                <form action="{{ route('messages.destroy', $message->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline-red" onclick="return confirm('Tem certeza que deseja excluir esta mensagem?')">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
