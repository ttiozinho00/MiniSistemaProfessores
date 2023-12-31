@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8">
        <h2 class="text-3xl font-bold mb-4">Lista de Professores</h2>
        <div class="table-responsive">
            <table class="w-full border border-gray-300">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="py-2 px-4 border-b">ID</th>
                        <th class="py-2 px-4 border-b">Nome do Professor</th>
                        <th class="py-2 px-4 border-b">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($professors as $professor)
                        <tr class="border-b">
                            <td class="py-2 px-4">{{ $professor->id }}</td>
                            <td class="py-2 px-4">{{ $professor->name }}</td>
                            <td class="py-2 px-4">
                                <form action="{{ route('professors.destroy', ['professor' => $professor->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded focus:outline-none focus:shadow-outline-red" onclick="return confirm('Tem certeza que deseja excluir este professor?')">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="py-2 px-4">Nenhum professor cadastrado.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('professors.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline-blue">Cadastrar Novo Professor</a>
            @if (!$professors->isEmpty())
                <a href="{{ route('professors.allPendingMessages', ['professor' => $professors->first()->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-2 focus:outline-none focus:shadow-outline-blue">Mensagens Pendentes</a>
                <a href="{{ route('professors.allRespondedMessages', ['professor' => $professors->first()->id]) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded ml-2 focus:outline-none focus:shadow-outline-green">Mensagens Respondidas</a>
            @endif
        </div>
    </div>
@endsection
