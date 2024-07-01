<!-- resources/views/plataformas/index.blade.php -->

<h2>Plataformas</h2>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
        </tr>
    </thead>
    <tbody>
        @foreach($plataformas as $plataforma)
        <tr>
            <td>{{ $plataforma->id }}</td>
            <td>{{ $plataforma->nome }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
