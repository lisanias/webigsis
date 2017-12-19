<?php

namespace App\Http\Controllers\Discipulo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Telefone;
use App\Http\Requests\Discipulo\TelefoneFormRequest;

class TelefoneController extends Controller
{
    private $telefone;
    
        public function __construct(Telefone $telefone)
        {
            $this->telefone = $telefone;
        }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($discipulo=null)
    {
        // verificar se foi passado o valor para o discipulo ou para o id
        $get_id = ( isset($_GET['id']) ) ? $_GET['id'] : null;
        $id = ($discipulo) ? $discipulo : $get_id;
       
        if ($id)
            return view('discipulo.telefone.telefone', compact('id') );
        else
            return redirect()
                ->root('discipulo')
                ->with(['alert'=>'O telefone tem sempre que estar associado a um discipulo', 'alert-type'=>'warning']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TelefoneFormRequest $request)
    {
        // Pega todos os dados que vem do formulário
        $dataForm = $request->all();

        

        $telefone = $this->telefone->create($dataForm);

        if( $telefone ) 
            if($request->add_outro)
                return redirect()
                    ->route( 'telefone.create', ['id'=>$request->discipulo_id] )
                    ->with(['alert'=>'Telefone adicionado com sucesso.', 'alert_type'=>'success']);
            else
            return redirect()
                ->route('discipulo.show', $request->discipulo_id)
                ->with(['alert'=>'Telefone adicionado com sucesso.', 'alert_type'=>'success']);
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
        return "Ver id: {$id}";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $telefone = Telefone::find($id);
        
        /**
         * o id que veio é o id do telefone
         * agora o id passa ser o do discipulo para enviar para a pagina
         */
        $id = $telefone->discipulo_id;
        
        return view('discipulo.telefone.telefone', compact('telefone', 'id') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TelefoneFormRequest $request, $id)
    {
        // Pega os dados do formulário
        $dataForm = $request->all();

        //Localiza o telefone na base de dados
        $telefone = $this->telefone->find($id);

        // Atualiza a base de dados
        $update = $telefone->update($dataForm);
        
        if( $update )
            return redirect()
                ->route( 'discipulo.show', $telefone->discipulo_id )
                ->with(['alert'=>'Telefone atualizado!', 'alert_type'=>'success']);
        else
            return redirect()
                ->route('telefone.edit', $id )
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
        //procurar o arquivo a ser apagado para pegar o id do dicipulo para voltar nele
        $telefone = $this->telefone->find($id);
        $return_id = $telefone->discipulo_id;

        $delete = Telefone::destroy($id);

        if( $delete )
            return redirect()
                ->route( 'discipulo.show', $return_id )
                ->with(['alert'=>'Telefone apagado.', 'alert_type'=>'success']);
        else
            return redirect()
                ->route('telefone.edit', $id )
                ->with(['alert'=>'Não foi possivel gravar os dados!', 'alert_type'=>'danger']);
    }

    
}
