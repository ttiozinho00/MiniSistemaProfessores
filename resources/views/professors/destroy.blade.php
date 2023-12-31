<!-- resources/views/professors/destroy.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2>Excluir Professor</h2>
        <p>Você tem certeza de que deseja excluir o professor "{{ $professor->name }}"?</p>
        <form action="{{ route('professors.destroy', ['professor' => $professor->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Excluir</button>
            <a href="{{ route('professors.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
