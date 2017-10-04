@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col-md-6">
        <form method="post" action="{{ url('/dashboard/projects') }}">
            <div class="form-group">
                <label for="inputName">Name</label>
                <input type="text" class="form-control" id="inputName" placeholder="Name">
            </div>
            <div class="form-group">
                <label for="inputCategory">Category</label>
                <select class="form-control" id="inputCategory">
                    <option value="web">web</option>
                    <option value="android">android</option>
                    <option value="descktop">descktop</option>
                    <option value="ios">ios</option>
                </select>
            </div>
            <div class="form-group">
                <label for="inputPreview">Preview</label>
                <input type="file" class="form-control" id="inputPreview" placeholder="Prview">
            </div>
            <div class="form-group">
                <label for="inputClient">Client</label>
                <input type="text" class="form-control" id="inputClient" placeholder="Client">
            </div>
            <div class="form-group">
                <label for="inputDescription">Description</label>
                <textarea name="description" id="inputDescription" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-info">CREATE</button>
        </form>
    </div>
    <div class="col-md-6"></div>
</div>

@endsection