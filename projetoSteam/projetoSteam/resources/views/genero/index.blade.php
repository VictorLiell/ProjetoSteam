<table>
    <thead>
        <th>ID</th>
        <th>Nome</th>
    </thead>
    <tbody>
        @foreach($genero as $genero)
        <tr>
            <td>{{ $genero->id }}</td>
            <td>{{ $genero->nome }}</td>
             <td>
                <form action="{{ route('genero.destroy', $genero) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this genre?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>