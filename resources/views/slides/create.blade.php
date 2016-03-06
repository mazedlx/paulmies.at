@extends('layouts.administration')
@section('content')
<div class="row">
    <div class="col-md-12">
        {!! Form::open(['route' => ['admin.slides.store'], 'class' => 'form-horizontal', 'files' => true]) !!}
        <div class="form-group">
            {!! Form::label('title', '&Uuml;berschrift', ['class' => 'control-label col-md-2']) !!}
            <div class="col-md-6">
                {!! Form::text('title', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => '&Uuml;berschrift']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('text', 'Text', ['class' => 'control-label col-md-2']) !!}
            <div class="col-md-6">
                {!! Form::textarea('text', null, ['class' => 'form-control', 'placeholder' => 'Text']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('sort', 'Reihenfolge', ['class' => 'control-label col-md-2']) !!}
            <div class="col-md-6">
                {!! Form::input('number', 'sort', null, ['min' => 0, 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Reihenfolge']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('file', 'Bild', ['class' => 'control-label col-md-2']) !!}
            <div class="col-md-6">
                {!! Form::file('file', ['class' => 'form-control', 'required' => 'required']) !!}
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-offset-2 col-md-6">
                <button class="btn btn-primary" type="submit">Slide anlegen</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection
