<?php

namespace App\Http\Controllers;
use App\Models\Jogo;
use Illuminate\Http\Request;


class JogoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jogos = Jogo::all();
        return view('jogos.index', compact('jogos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jogos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
  public function store(Request $request)
{
    $validatedData = $request->validate([
        'nome' => 'required|max:255',
        'descricao' => 'required',
        'preco' => 'required|numeric',
        'categoria_id' => 'required|exists:categorias,id',
        'imagem' => 'nullable|image|max:2048', 
    ]);

    if ($request->hasFile('imagem')) {
        $imagemPath = $request->file('imagem')->store('public/jogos');
        $validatedData['imagem'] = basename($imagemPath);
    }

    $jogo = Jogo::create($validatedData);

    return redirect()->route('jogos.index')
        ->with('success', 'Jogo criado com sucesso!');
}
    /**
     * Display the specified resource.
     */
   public function show(string $id)
{
    $jogo = Jogo::findOrFail($id);
    return view('jogos.show', compact('jogo'));
}
    /**
     * Show the form for editing the specified resource.
     */
   public function edit(string $id)
{
    $jogo = Jogo::findOrFail($id);
    return view('jogos.edit', compact('jogo'));
}

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, string $id)
{
    $validatedData = $request->validate([
        'nome' => 'required|max:255',
        'descricao' => 'required',
        'preco' => 'required|numeric',
        'categoria_id' => 'required|exists:categorias,id',
        'imagem' => 'nullable|image|max:2048',
    ]);

    $jogo = Jogo::findOrFail($id);

    if ($request->hasFile('imagem')) {
        $imagemPath = $request->file('imagem')->store('public/jogos');
        $validatedData['imagem'] = basename($imagemPath);
    }

    $jogo->update($validatedData);

    return redirect()->route('jogos.index')
        ->with('success', 'Jogo atualizado com sucesso!');
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    $jogo = Jogo::findOrFail($id);
    $jogo->delete();

    return redirect()->route('jogos.index')
        ->with('success', 'Jogo removido com sucesso!');
}
}
