<?php

namespace App\Http\Controllers;

use App\Models\Maquina;
use Illuminate\Http\Request;

/**
 * Class MaquinaController
 * @package App\Http\Controllers
 */
class MaquinaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $maquinas = Maquina::paginate();

        return view('maquina.index', compact('maquinas'))
            ->with('i', (request()->input('page', 1) - 1) * $maquinas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $maquina = new Maquina();
        return view('maquina.create', compact('maquina'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Maquina::$rules);

        $maquina = Maquina::create($request->all());

        return redirect()->route('maquinas.index')
            ->with('success', 'Maquina created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $maquina = Maquina::find($id);

        return view('maquina.show', compact('maquina'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $maquina = Maquina::find($id);

        return view('maquina.edit', compact('maquina'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Maquina $maquina
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Maquina $maquina)
    {
        request()->validate(Maquina::$rules);

        $maquina->update($request->all());

        return redirect()->route('maquinas.index')
            ->with('success', 'Maquina updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $maquina = Maquina::find($id)->delete();

        return redirect()->route('maquinas.index')
            ->with('success', 'Maquina deleted successfully');
    }
}
