@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="p-2 mt-2 text-end">
                    <a href="{{route('admin.projects.index' )}}" class="btn btn-primary"> Tutti i progetti</a>
                </div>
            </div>
            <div class="col-12">
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <form action="{{route('admin.projects.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="control-label" >Title</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="name" value="{{old('name')}}">
                    </div>
                  
                    <div class="form-group">
                        <label class="control-label" >Link</label>
                        <input type="link" id="link" name="link" class="form-control" placeholder="link" value="{{old('link')}}">
                    </div>

                    <div class="form-group">
                        <label class="control-label" >Copertina</label>
                        <input type="file" id="img" name="img" class="form-control" placeholder="img" value="{{old('img')}}">
                    </div>

                    <div class="form-group">
                        <label class="control-label" >Tipologia</label>
                        <select class="form-control" name="type_id" id="type_id">
                            @foreach($types as $type)
                            <option value="{{$type->id}}">{{$type->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class=" form-group mt-2">
                        <button type="submit" class="btn btn-success"> Salva</button>
                    </div>
                </form>

            </div>
              

        </div>
    </div>

@endsection