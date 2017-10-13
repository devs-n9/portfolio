@extends('layouts.dashboard')

@section('content')
<h1 class="page-header">Projects</h1>
<div class="row">
    <div class="col-md-12">
        <a href="{{ url('/dashboard/projects/create') }}" class="btn btn-success">ADD PROJECT</a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Date</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($projects as $project)
                    <tr>
                        <td>{{ $project->id }}</td>
                        <td>{{ $project->name }}</td>
                        <td>{{ $project->category->category }}</td>
                        <td>{{ $project->date }}</td>
                        <td>
                            <a href="/dashboard/projects/{{ $project->id }}/edit">
                                <i class="glyphicon glyphicon-pencil"></i>
                            </a>
                        </td>
                        <td>
                            <a href="#" onclick="event.preventDefault();
                                            this.children[0].submit();">
                                            
                                <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="delete">
                                </form>
                                <i class="glyphicon glyphicon-remove"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection