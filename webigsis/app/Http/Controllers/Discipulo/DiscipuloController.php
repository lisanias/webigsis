<?php

namespace App\Http\Controllers\Discipulo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Discipulo\DiscipuloFormRequest;
use App\Models\Discipulo;
use App\Models\Telefone;
use App\Models\Celula;

class DiscipuloController extends Controller
{
    private $discipulo;
    private $totalPage = 15;

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
        $discipulos = $this->discipulo->orderBy('name', 'ASC', SORT_REGULAR, true)->paginate($this->totalPage);
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

        $lideres = Discipulo::orderBy('name')
            ->get()
            ->where('e_lider', 1)
            ->pluck('name', 'id');
      
        //dd($lideres);

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
        $discipulo = Discipulo::find($id);

        $lideres = Discipulo::orderBy('name')
                ->get()
                ->where('e_lider', 1)
                ->pluck('name', 'id');

        $celulas = Celula::get();
        foreach ( $celulas as $celula ){
            $selCelula[$celula->id] = $celula->lider->name.' / '.$celula->name; 
        }

        $recebidoModo = [''=>'Não Membro', 1=>'Batismo', 2=>'Jurisdição'];
        
        return view('discipulo.edit-add', compact('discipulo', 'lideres', 'recebidoModo', 'selCelula'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DiscipuloFormRequest $request, $id)
    {
        // Pega os dados do formulário
        $dataForm = $request->all();
        
        //Localiza o discipulo na base de dados
        $discipulo = $this->discipulo->find($id);

        // Atualiza a base de dados
        $update = $discipulo->update($dataForm);
        
        if( $update )
            return redirect()
                ->route( 'discipulo.show', $discipulo->id )
                ->with(['alert'=>'Discipulo atualizado!', 'alert_type'=>'success']);
        else
            return redirect()
                ->route('discipulo.edit', $id )
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
        $delete = Discipulo::destroy($id);
        
                if( $delete )
                    return redirect()
                        ->route( 'discipulo.index')
                        ->with(['alert'=>"Dicipulo apagado com sucesso. <small>[Ref. ID:{{$id}}]</small>", 'alert_type'=>'success']);
                else
                    return redirect()
                        ->route('discipulo.show', $id )
                        ->with(['alert'=>'Não foi possivel apagar este discipulo!', 'alert_type'=>'danger']);
    }

    public function search()
    {
        $str = $_POST['str-find'];

        $discipulos = $this->discipulo->orderBy('name', 'ASC', SORT_REGULAR, true)->where('name', 'LIKE', '%'.$str.'%')->paginate($this->totalPage);
        
        return view('discipulo.list', compact('discipulos', 'str'));


        /*$discipulos = Discipulo::where('name', 'LIKE', '%'.$str.'%')
            ->orderBy('name')
            ->get()'ASC', SORT_REGULAR, true;->get()*/
        
        //return "Procurando... {$str}<br>$discipulos";
        //return view('discipulo.list', compact('discipulos'));

    }

}

