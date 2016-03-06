@extends('layouts.administration')
@section('content')
<div class="row">
    <div class="col-md-12">
        <a href="/admin/slides/create" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Slide anlegen</a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>Titel</th>
                    <th>Text</th>
                    <th>Bild</th>
                    <th>Reihenfolge</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @if($slides->count() > 0)
                @foreach($slides as $slide)
                <tr>
                    <td>{{ $slide->title }}</td>
                    <td>{{ $slide->text }}</td>
                    <td><img src="/uploads/slides/thumb_{{ $slide->filename }}" alt=""></td>
                    <td>{{ $slide->sort }}</td>
                    <td>
                        <a class="btn btn-default" href="/admin/slides/{{ $slide->id }}/edit"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                    </td>
                </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5">Keine Slides gefunden.</td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
</div>
@endsection

