<?php

namespace App\Http\Controllers\Discipulo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Discipulo;

class DiscipuloController extends Controller
{
    private $discipulo;

    public function __construct(Discipulo $discipulo)
    {
        $this->discipulo = $discipulo;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'Discipulo index - Listar discipulos';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('discipulo.edit-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Pega todos os dados que vem do formulário
        $dataForm = $request->all();

        /**
         * Campos que não podem ser null 
         * 
         * $dataForm['batismo'] = ( isset($dataForm['sexo'])) ? 1 : 0;
         */
        

        // Faz o cadastro na base de dados
        $discipulo = $this->discipulo->create($dataForm);
        $discipulo_id = $discipulo->id;

        

        if( $discipulo ) 
            return redirect()
                ->route('discipulo.show', $discipulo_id)
                ->with(['alert'=>'Discipulo adicionado com sucesso.', 'alert_type'=>'success']);
        else
            return redirect()
                ->route('discipulo.add')
                ->with(['alert'=>'Erro ao inserir', 'alert_type'=>'danger']);
        
    }

   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $discipulo = Discipulo::find($id);
        $lider = Discipulo::find($discipulo->lider_id);
        return view('discipulo.view', compact('discipulo', 'lider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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

    public function add()
    {
        $recebidoModo = [1=>'Batismo', 2=>'Jurisdição'];

        return view('discipulo.edit-add', compact('recebidoModo'));
    }
    public function add2($disipulo_id)
    {
        
        //return view('discipulo.edit-add-2', compact('recebidoModo'));
    }
}
