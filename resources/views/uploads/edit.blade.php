@extends('layouts.administration')
@section('content')
<div class="row">
    <div class="col-md-12">
    {!! Form::model($upload, ['route' => ['admin.uploads.update', $upload->id], 'class' => 'form-horizontal', 'files' => true]) !!}
    {!! method_field('PATCH') !!}
    <div class="form-group">
        {!! Form::label('content_id', 'Inhalt', ['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-6">
            {!! Form::select('content_id', $contents, null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('description', 'Beschreibung', ['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-6">
        {!! Form::text('description', null, ['class' => 'form-control', 'placeholder' => 'Beschreibung']) !!}
        </div>
    </div>
     <div class="form-group">
        {!! Form::label('sort', 'Reihenfolge', ['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-6">
        {!! Form::input('number', 'sort', null, ['min' => 0, 'class' => 'form-control', 'placeholder' => 'Reihenfolge']) !!}
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-offset-2 col-md-6">
            <button type="submit" class="btn btn-primary">&Auml;nderungen speichern</button>
        </div>
    </div>
    {!! Form::close() !!}
       {!! Form::open(['route' => ['admin.uploads.destroy', $upload->id], 'class' => 'form-horizontal']) !!}
    {!! method_field('DELETE') !!}
    <div class="form-group">
        <div class="col-md-offset-2 col-md-6">
        <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Bild l&ouml;schen</button>
    </div>
    </div>
    {!! Form::close() !!}
    </div>

</div>
@endsection
