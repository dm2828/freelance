
@extends('layouts.app-master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Page') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <form action="/crud/{{$crud->id}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Send back changes</label>
                            <textarea name="note" id="" cols="15" rows="10" class="form-control">{{$crud->note}}</textarea>
                            @if ($errors->has('post'))
                                <span class="text-danger text-left">{{ $errors->first('post') }}</span>
                            @endif
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('crud.index') }}" class="btn btn-danger me-2">cancel</a>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
