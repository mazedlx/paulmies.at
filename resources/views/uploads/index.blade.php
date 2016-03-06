@extends('layouts.administration')
@section('content')
<div class="row">
    <div class="col-md-12">
        <a href="/admin/uploads/create" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Bilder hochladen</a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>Inhalt</th>
                    <th>Beschreibung</th>
                    <th>Reihenfolge</th>
                    <th>Bild</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach($uploads as $upload)
                <tr>
                    <td>{{ $upload->content->title }}</td>
                    <td>{{ $upload->description}}</td>
                    <td>{{ $upload->sort }}</td>
                    <td><img src="/uploads/thumb_{{ $upload->filename }}" alt="" class="thumbnail"></td>
                    <td>
                        <a class="btn btn-default" href="/admin/uploads/{{ $upload->id }}/edit"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="row">
    <div class="col-md-12 text-center">

    </div>
</div>
@endsection
