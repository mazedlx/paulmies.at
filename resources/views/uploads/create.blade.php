@extends('layouts.administration')
@section('content')
<div class="row">
    <div class="col-md-12">
    {!! Form::open(['route' => ['admin.uploads.store'], 'class' => 'form-horizontal', 'files' => true]) !!}
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
        {!! Form::label('files', 'Bilder', ['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-6">
        {!! Form::file('files[]', ['class' => 'form-control', 'required' => 'required', 'multiple' => 'multiple']) !!}
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-offset-2 col-md-6">
            <button type="submit" class="btn btn-primary">Bilder hochladen</button>
        </div>
    </div>
    {!! Form::close() !!}
    </div>
</div>
@endsection
