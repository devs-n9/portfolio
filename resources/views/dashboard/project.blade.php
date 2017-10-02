@extends('layouts.dashboard')

@section('content')
<h1 class="page-header">Projects</h1>

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
                        <td>{{ $project->category }}</td>
                        <td>{{ $project->date }}</td>
                        <td>
                            <a href="/dashbord/projects/edit">
                                <i class="glyphicon glyphicon-pencil"></i>
                            </a>
                        </td>
                        <td>
                            <a href="/dashbord/projects/delete">
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