<?php

namespace App\Http\Controllers\Discipulo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Discipulo;
use App\Models\Telefone;
use App\Http\Requests\Discipulo\DiscipuloFormRequest;

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
        $discipulos = Discipulo::all();
        return view('discipulo.list', compact('discipulos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $recebidoModo = [''=>'Não Membro', 1=>'Batismo', 2=>'Jurisdição'];

        $lideres = Discipulo::get()
            ->where("e_lider", 1);
        
        return view('discipulo.edit-add', compact('recebidoModo', 'lideres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DiscipuloFormRequest $request)
    {
        // Pega todos os dados que vem do formulário
        $dataForm = $request->all();

        // Faz o cadastro na base de dados
        $discipulo = $this->discipulo->create($dataForm);
        $discipulo_id = $discipulo->id;

        if( $discipulo ) 
            return redirect()
                ->route( 'telefone.create', ['id'=>$discipulo_id] )
                ->with(['alert'=>'Discipulo criado com sucesso! Adicione agora o telefone.', 'alert_type'=>'success']);
                /*->route('discipulo.show', $discipulo_id)
                ->with(['alert'=>'Discipulo adicionado com sucesso.', 'alert_type'=>'success']);*/
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
        $telefones = Telefone::where('discipulo_id', $discipulo->id)->get();

        switch($discipulo->sexo) {
            case 'M':
            $discipulo->sexo = "Masculino";
            break;
            case "F":
            $discipulo->sexo = "Feminino";
            break;
        }

        return view('discipulo.view', compact('discipulo', 'lider', 'telefones'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return 'editar arquivo';
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
        return "apagar ".$id;
    }

}

