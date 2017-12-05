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

        $dataForm['encontro'] = ( isset($dataForm['encontro']) ) ? 1 : 0;
        $dataForm['escolaMinisterios'] = ( isset($dataForm['escolaMinisterios'])) ? 1 : 0;
        $dataForm['batismo'] = ( isset($dataForm['batismo'])) ? 1 : 0;

        /*if(isset($dataForm['nascimento_data']))
            $dataForm['nascimento_data'] = date('Y-m-d', strtotime( str_replace('-', '/', $dataForm)));*/
        
        // Faz o cadastro na base de dados
        $insert = $this->discipulo->create($dataForm);

        

        if( $insert ) 
            return redirect()->route('discipulo.add')->with('data', 'Inserido com sucesso');
        else
            return redirect()->route('discipulo.add')->with('data', 'Erro ao inserir');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        return view('discipulo.edit-add');
    }
}
