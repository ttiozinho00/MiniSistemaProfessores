@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8">
        <h2 class="text-3xl font-bold mb-4">Mensagens Pendentes</h2>
        <div class="table-responsive">
            <table class="w-full border border-gray-300">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="py-2 px-4 border-b">Nome do Aluno</th>
                        <th class="py-2 px-4 border-b">Data</th>
                        <th class="py-2 px-4 border-b">Status</th>
                        <th class="py-2 px-4 border-b">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($messages as $message)
                        <tr class="border-b">
                            <td class="py-2 px-4">{{ $message->student_name }}</td>
                            <td class="py-2 px-4">{{ $message->created_at->format('d/m/Y') }}</td>
                            <td class="py-2 px-4 text-left"> <!-- Adicione essa classe para alinhar o conteúdo à esquerda -->
                                <p>{{ $message->status }}</p>
                                <td class="py-2 px-4"><a href="{{ route('professors.messages.show', ['professor' => $message->professor_id, 'message' => $message->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded focus:outline-none focus:shadow-outline-blue">Ver</a></td>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="py-2 px-4">Nenhuma mensagem pendente disponível.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
