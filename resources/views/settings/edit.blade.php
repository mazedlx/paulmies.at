@extends('layouts.administration')
@section('content')
<div class="row">
    <div class="col-md-12">
        {!! Form::model($config, ['route' => ['admin.settings.update', $config->id], 'class' => 'form-horizontal']) !!}
        {!! method_field('PATCH') !!}
        <div class="form-group">
            {!! Form::label('value', 'Wert', ['class' => 'control-label col-md-2']) !!}
            <div class="col-md-6">
                {!! Form::text('value', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Wert']) !!}
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-offset-2 col-md-6">
                <button class="btn btn-primary" type="submit">&Auml;nderungen speichern</button>
            </div>
        </div>
        {!! Form::close() !!}
@endsection
