@extends('layouts.administration')
@section('content')
<div class="row">
    <div class="col-md-12">
        <a href="/admin/contents/create" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Inhalt anlegen</a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>&Uuml;berschrift</th>
                    <th>Teaser</th>
                    <th>Inhalt</th>
                    <th>Reihenfolge</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @if($contents->count() > 0)
                @foreach($contents as $content)
                <tr>
                    <td>{{ $content->title }}</td>
                    <td>{{ $content->teaser }}</td>
                    <td>{{ $content->content }}</td>
                    <td>{{ $content->sort }}</td>
                    <td>
                        <a class="btn btn-default" href="/admin/contents/{{ $content->id }}/edit"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                    </td>
                </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5">Keine Inhalte gefunden.</td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
