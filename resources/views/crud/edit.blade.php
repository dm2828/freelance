
@extends('layouts.app-master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Changes') }}</div>

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
                            <textarea name="note" id="" cols="15" rows="10" class="form-control"></textarea>
                            @if ($errors->has('note'))
                                <span class="text-danger text-left">{{ $errors->first('note') }}</span>
                            @endif
                        </div>
                        
                        <div class="form-group">
                            <label for="img">File Upload</label>
                            <input type="file" name="file" class="form-control-file" id="file">
                            @if ($errors->has('file'))
                                <span class="text-danger text-left">{{ $errors->first('file') }}</span>
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
