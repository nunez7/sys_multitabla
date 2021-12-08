<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Models\Categoria;
use Illuminate\Http\Request;

/**
 * Class LibroController
 * @package App\Http\Controllers
 */
class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libros = Libro::paginate();
        return view('libro.index', compact('libros'))
            ->with('i', (request()->input('page', 1) - 1) * $libros->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $libro = new Libro();
        //Consultamos las categorias
        $categorias = Categoria::pluck('nombre', 'cve_categoria');

        return view('libro.create', compact('libro', 'categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Libro::$rules);

        $libro = Libro::create($request->all());

        return redirect()->route('libros.index')
            ->with('success', 'Libro creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$libro = Libro::find($id);
        $libro = Libro::where("cve_libro","=", $id)->first();
        return view('libro.show', compact('libro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$libro = Libro::find($id);
        $libro = Libro::where("cve_libro","=", $id)->first();

        $categorias = Categoria::pluck('nombre', 'cve_categoria');

        return view('libro.edit', compact('libro', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Libro $libro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate(Libro::$rules);

        //$libro->update($request->all());
        $datos = request()->except(['_token', '_method']);
        Libro::where('cve_libro','=',$id)->update($datos);
        return redirect()->route('libros.index')
            ->with('success', 'Libro actualizado');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        //$libro = Libro::find($id)->delete();
        $libro = Libro::where("cve_libro","=", $id)->delete();
        return redirect()->route('libros.index')
            ->with('success', 'Libro borrado');
    }
}
