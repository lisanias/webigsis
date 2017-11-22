@extends('gentelella.layouts.app')

@section('content')

    
    <div class="x_title">
        <h2>Listar</h2>
        <div class="clearfix"></div>
    </div>

    <div class="x_content">
      
      <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Nome</th>
                          <th>Email</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($users as $user)
	                       <tr>
	                          <th scope="row">{{$user->id}}</th>
	                          <td>{{$user->name}}</td>
	                          <td>{{$user->email}}</td>
	                          <td>
	                          	  <a href="{{ route('user.show', $user->id) }}" class="btn btn-success btn-xs"><span class="fa fa-check"></span></a>
	                          	  <a href="{{ route('user.edit', $user->id) }}" class="btn btn-info btn-xs"><span class="fa fa-edit"></span></a>
	                          	  <a href="#" class="btn btn-danger btn-xs"><span class="fa fa-trash-o"></span></a>
	                          </td>
	                       </tr>
                        @endforeach
                      </tbody>
                    </table>

    </div>

@endsection
