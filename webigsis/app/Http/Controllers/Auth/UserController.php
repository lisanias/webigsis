<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    
    private $label="<i class='fa fa-user-circle' aria-hidden='true'></i> ";
    
    public function __construct()
    {
        //
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $label = $this->label.'Usuários/Listar';
        return view('gentelella.auth.list', compact('users','label','auth'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "WebIG - Usuários";
        $label = $this->label."Usuários";
        return view('gentelella.auth.create', compact('title', 'label' ));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $label = 'Usuários';
        $title = 'WebIG | Usuário';
        //return "profile: {$user}";
        return view('gentelella.auth.profile', compact('title','label', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $title = "WebIG - Usuários";
        $label = $this->label."Usuários";
        return view('gentelella.auth.create', compact('title', 'label', 'user' ));
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
        $dataForm = $request->all();
        $user = User::find($id);
        $update = $user->update($dataForm);

        if( $update ) 
            return redirect()->route('user.show', $id);
        else 
            return redirect()->route('user.edit', $id)->with(['errors'=>'Falha ao editar.']);
        


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

    /** 
     * by lisanias
     */

    public function profile () 
    {
        $user = auth()->user();
        $label = 'Usuários';
        $title = 'WebIG | Usuário';
        //return "profile: {$autor}";
        return view('gentelella.auth.profile', compact('title','label', 'user'));
    }

}
