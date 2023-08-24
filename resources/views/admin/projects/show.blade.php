@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="p-2 text-end">
                <a href="{{route('admin.projects.index' )}}" class="btn btn-primary"> Tutti i progetti</a>
            </div>
        </div>
        <div class="col-12">
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Link</th>
                    <th scope="col">Tipologia</th>
                    <th scope="col">Copertina</th>
                  </tr>
                </thead>
                <tbody>
                    <tr>
                      <td>{{$project->name}}</td>
                      <td>{{$project->link}}</td>
                      <td>{{$project->type->name}}</td>
                      <td>
                        <img class="img-thumbnail img-fluid" src="{{ asset('storage/'.$project-> img)}}" alt=""></td>  
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection