<?php

namespace App\Http\Controllers;

use App\Models\Tecnico;
use Illuminate\Http\Request;

/**
 * Class TecnicoController
 * @package App\Http\Controllers
 */
class TecnicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tecnicos = Tecnico::paginate();

        return view('tecnico.index', compact('tecnicos'))
            ->with('i', (request()->input('page', 1) - 1) * $tecnicos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tecnico = new Tecnico();
        return view('tecnico.create', compact('tecnico'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Tecnico::$rules);

        $tecnico = Tecnico::create($request->all());

        return redirect()->route('tecnicos.index')
            ->with('success', 'Tecnico created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tecnico = Tecnico::find($id);

        return view('tecnico.show', compact('tecnico'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tecnico = Tecnico::find($id);

        return view('tecnico.edit', compact('tecnico'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Tecnico $tecnico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tecnico $tecnico)
    {
        request()->validate(Tecnico::$rules);

        $tecnico->update($request->all());

        return redirect()->route('tecnicos.index')
            ->with('success', 'Tecnico updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $tecnico = Tecnico::find($id)->delete();

        return redirect()->route('tecnicos.index')
            ->with('success', 'Tecnico deleted successfully');
    }
}
