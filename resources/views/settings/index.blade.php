@extends('layouts.administration')
@section('content')
<div class="row">
    <div class="col-md-12">
        <table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Einstellung</th>
            <th>Wert</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    @if($configs->count() > 0)
        @foreach($configs as $config)
        <tr>
            <td>{{ $config->label }}</td>
            <td>{{ $config->value }}</td>
            <td><a class="btn btn-default" href="/admin/settings/{{ $config->id }}/edit"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a></td>
        </tr>
        @endforeach
    @else
        <tr>
            <td colspan="3">Keine Einstellungen vorhanden.</td>
        </tr>
    @endif
    </tbody>
</table>
    </div>
</div>
@endsection
