<x-app-layout>
<head>
    <link rel="stylesheet" href="{{ asset('/public/css/index.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
</head>
    <div class="container">
        <br>
        {{-- <img src="{{ asset('img/dbz.jpg') }}" alt=""> --}}
        <a href="{{ route('distribuidoras.create') }}" class="btn btn-primary">Nova Distribuidora</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Descricao</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($distribuidoras as $distribuidora)
                    <tr>
                        <td class="colunas">{{ $distribuidora->id }}</td>
                        <td id="nome">{{ $distribuidora->nome }}</td>
                        <td>
                            <a href="{{ route('distribuidoras.show', $distribuidora->id) }}" class="btn btn-info">Detalhes</a>
                            <a href="{{ route('distribuidoras.edit', $distribuidora->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('distribuidoras.destroy', $distribuidora->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- {{ $distribuidoras->links() }} --}}
    </div>
</x-app-layout>