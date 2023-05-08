@extends('layouts.app-master')

@section('content')
@auth
<div class="container mt-5">
    <div class="row justify-content-center">
    <div class="col-12">
                <h1>Welcome {{$user->username}},</h1> </br>
                     @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                <?php if($user->role == 0){?>
                <a href="crud/create" class="btn btn-primary mb-2">Create +</a> 
                <?php } ?>
                <br>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>User</th>
                            <th>Title</th>
                            <th>Created at</th>
                            <th>Note</th>
                            <th>Submitted</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cruds as $crud)
                        <tr>
                            <td>{{ $crud->id }}</td>
                            <td>{{ $crud->username }}</td>
                            <td>{{ $crud->title }}</td>
                            <td>{{ date('Y-m-d', strtotime($crud->created_at)) }}</td>
                            <td>{{ $crud->note }}</td>
                            <td><input type="checkbox" disabled <?php echo ($crud->status == 1) ? "checked" : "";?>></td>
                            <td>
                            <a href="crud/{{$crud->id}}/edit" class="btn btn-primary">Send back</a>
                            <?php if($crud->status == 0){?>
                            <form action="crud/{{$crud->id}}" method="post" class="d-inline">
                                {{ csrf_field() }}
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Submit</button>
                            </form>
                            <?php } ?>
                            <a href="crud/{{$crud->id}}" class="btn btn-primary">Project Details</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div> 
    </div>
    Note: Checked box indicate the submitted projects.</br>
    You can not change the status of submitted projects.
    {{ $cruds->links() }}
</div>
@endauth

      @guest
        <h1>Please login/ SIgnup</h1>
        <p class="lead">Your viewing the home page. Please login to view the restricted data.</p>
      @endguest
@endsection