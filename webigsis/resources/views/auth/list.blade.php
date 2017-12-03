@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    
    <h1>Usuários</h1>
    
@stop

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class='box box-primary'>
                <div class="box-header with-border">
                    <h3 class="box-title">Listar</h3>
                    <div class="clearfix"></div>
                </div>
                <div class="box-body">
                    <table class="table table-bordered table-hover">
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
                                    <a href="{{ route('user.destroyer', $user->id) }}" class="btn btn-danger btn-xs"><span class="fa fa-trash-o"></span></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop