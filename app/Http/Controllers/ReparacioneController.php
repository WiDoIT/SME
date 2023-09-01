<?php

namespace App\Http\Controllers;

use App\Models\Reparacione;
use Illuminate\Http\Request;
use App\Models\Tecnico;
use App\Models\Maquina;
/**
 * Class ReparacioneController
 * @package App\Http\Controllers
 */
class ReparacioneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reparaciones = Reparacione::paginate();

        return view('reparacione.index', compact('reparaciones'))
            ->with('i', (request()->input('page', 1) - 1) * $reparaciones->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $reparacione = new Reparacione();
        $tecnicos= Tecnico::pluck('nombre','id');
        $maquinas= Maquina::pluck('nombre','id');
        return view('reparacione.create', compact('reparacione','tecnicos','maquinas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Reparacione::$rules);

        $reparacione = Reparacione::create($request->all());

        return redirect()->route('reparaciones.index')
            ->with('success', 'Reparacione created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reparacione = Reparacione::find($id);

        return view('reparacione.show', compact('reparacione'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reparacione = Reparacione::find($id);
        $tecnicos= Tecnico::pluck('nombre','id');
        $maquinas= Maquina::pluck('nombre','id');
        return view('reparacione.edit', compact('reparacione','tecnicos','maquinas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Reparacione $reparacione
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reparacione $reparacione)
    {
        request()->validate(Reparacione::$rules);

        $reparacione->update($request->all());

        return redirect()->route('reparaciones.index')
            ->with('success', 'Reparacione updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $reparacione = Reparacione::find($id)->delete();

        return redirect()->route('reparaciones.index')
            ->with('success', 'Reparacione deleted successfully');
    }
}
