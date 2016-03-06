@extends('layouts.administration')
@section('content')
<div class="row">
    <div class="col-md-12">
        {!! Form::model($content, ['route' => ['admin.contents.update', $content->id], 'class' => 'form-horizontal']) !!}
        {!! method_field('PATCH') !!}
        <div class="form-group">
            {!! Form::label('title', '&Uuml;berschrift', ['class' => 'control-label col-md-2']) !!}
            <div class="col-md-6">
                {!! Form::text('title', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => '&Uuml;berschrift']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('teaser', 'Teaser', ['class' => 'control-label col-md-2']) !!}
            <div class="col-md-6">
                {!! Form::text('teaser', null, ['class' => 'form-control', 'placeholder' => 'Teaser']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('content', 'Inhalt', ['class' => 'control-label col-md-2']) !!}
            <div class="col-md-6">
                {!! Form::textarea('content', null, ['class' => 'form-control', 'placeholder' => 'Inhalt']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('sort', 'Reihenfolge', ['class' => 'control-label col-md-2']) !!}
            <div class="col-md-6">
                {!! Form::input('number', 'sort', null, ['min' => 0, 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Reihenfolge']) !!}
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-offset-2 col-md-6">
                <button class="btn btn-primary" type="submit">&Auml;nderungen speichern</button>
            </div>
        </div>
        {!! Form::close() !!}
        {!! Form::open(['route' => ['admin.contents.destroy', $content->id], 'class' => 'form-horizontal']) !!}
        {!! method_field('DELETE') !!}
        <div class="form-group">
            <div class="col-md-offset-2 col-md-6">
            <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Inhalt l&ouml;schen</button>
        </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection
