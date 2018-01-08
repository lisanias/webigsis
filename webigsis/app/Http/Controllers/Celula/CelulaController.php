<?php

namespace App\Http\Controllers\Celula;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Celula;
use App\Models\Discipulo;

class CelulaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $celulas = Celula::paginate();

        return view('celula.index', compact('celulas'));

        /*$discipulos = Discipulo::get();
        foreach ($discipulos as $discipulo) {
            $celulas = $discipulo->celulas()->get();
            foreach ($celulas as $celula) {
                echo $discipulo->name, ' / ', $celula->name, '<br>';
            }
        }*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lideres = Discipulo::orderBy('name')
            ->get()
            ->where('e_lider', 1)
            ->pluck('name', 'id');

        return view('celula.edit-add', compact('lideres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $celula = Celula::find($id);

        return view('celula.show', compact('celula'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $celula = Celula::find($id);

        $lideres = Discipulo::orderBy('name')
                ->get()
                ->where('e_lider', 1)
                ->pluck('name', 'id');

        return view('celula.edit-add', compact('celula', 'lideres'));
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
        // Pega os dados do formulário
        $dataForm = $request->all();

        //Localiza a celula que quer alterar na base de dados
        $celula = Celula::find($id);

        $update = $celula->update($dataForm);

        if( $update )
            return redirect()
                ->route( 'celula.show', $celula->id )
                ->with(['alert'=>'Celula atualizada!', 'alert_type'=>'success']);
        else
            return redirect()
                ->route('celula.edit', $id )
                ->with(['alert'=>'Não foi possivel gravar os dados!', 'alert_type'=>'danger']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
