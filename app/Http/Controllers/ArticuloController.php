<?php

namespace App\Http\Controllers;
use App\Articulo;
use Illuminate\Http\Request;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articulos = Articulo::latest()->paginate(5);
		return view('articulos.index',compact('articulos'))
		->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articulos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
           'titulo' => 'required',
           'contenido' => 'required',
        ]);
		Articulo::create($request->all());
		return redirect()->route('articulos.index')
		                 ->with('seccess','Articulo creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $articulo = Articulo::find($id);
	   return view('articulos.show',compact('articulo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $articulo = Articulo::find($id);
        return view('articulos.edit',compact('articulo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         request()->validate([
            'titulo' => 'required',
            'contenido' => 'required',
        ]);
        Articulo::find($id)->update($request->all());
        return redirect()->route('articulos.index')
                        ->with('success','Articulo actualizaado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         Articulo::find($id)->delete();
        return redirect()->route('articulos.index')
                        ->with('success','Articulo borrado');
    }
}
