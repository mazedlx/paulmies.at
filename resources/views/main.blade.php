@extends('layouts.master')
@section('content')
<header id="header">
    <nav id="main-menu" class="navbar navbar-default navbar-fixed-top" role="banner">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#home">
                    <img src="images/logo-pm.png" alt="logo">
                </a>
                <h1 style="font-size: 16px;">{{ $configs['logotext'] }}</h1>
            </div>
            <div class="collapse navbar-collapse navbar-right">
                <ul class="nav navbar-nav">
                <li class="scroll" style="display: none;"><a data-class="a-menu" href="#home">Home</a></li>
                @foreach($contents as $content)
                    <li class="scroll">
                        <a data-class="a-menu" href="#{{ $content->attribute }}">
                        {{ $content->title }}
                        </a>
                    </li>
                @endforeach
                    <li class="scroll"><a data-class="a-menu" href="#kontakt">Kontakt</a></li>
                    <li class="scroll"><a data-class="a-menu" href="#impressum">Impressum</a></li>
                </ul>
            </div>
        </div><!--/.container-->
    </nav><!--/nav-->
</header><!--/header-->
@if($slides->count() > 0)
<section id="main-slider">
    <div class="owl-carousel">
    @foreach($slides as $slide)
        <div class="item" style="background-image: url(uploads/slides/{{ $slide->filename }});">
            <div class="slider-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="carousel-content">
                                <h2>{{ $slide->title }}</h2>
                                <p>{{ $slide->text }}</p>
                                <a class="btn btn-primary btn-lg" href="#kontakt">Kontaktieren Sie uns</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/.item-->
    @endforeach
    </div><!--/.owl-carousel-->
</section><!--/#main-slider-->
@endif
<!--<section id="cta0">
    <div class="container">
        <div class="text-center">
            <h2 class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="0ms">
                Wir sind die Geilsten
            </h2>
            <p class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="100ms">Mauris pretium auctor quam. Vestibulum et nunc id nisi fringilla <br />iaculis. Mauris pretium auctor quam.</p>
            <p class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="200ms">&nbsp;</p>

        </div>
    </div>
</section> -->

<?php
$i = 0;
?>
@foreach($contents as $content)
<?php
$i++;
if($i%2 == 0) {
    $class = 'grey';
} else {
    $class = '';
}
?>
<section id="{{ $content->attribute }}" class="section {{ $class }}">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title text-center wow fadeInDown">{{ $content->title }}</h2>
            <p class="text-center wow fadeInDown">{{ $content->teaser }}</p>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="media service-box">
                    <p>{{ $content->content }}</p>
                </div>
            </div>
        </div>
        @if($content->uploads()->count() > 0)
        <div class="portfolio-items">
            @foreach($content->uploads as $upload)
            <div class="portfolio-item creative">
                <div class="portfolio-item-inner">
                    <a class="preview" href="uploads/{{ $upload->filename }}" rel="prettyPhoto"><img class="img-responsive" src="uploads/thumb_{{ $upload->filename }}" alt=""></a>
                    <div class="portfolio-info">
                        {{ $upload->description }}
                    </div>
                </div>
            </div><!--/.portfolio-item-->
            @endforeach
        </div><!--/.portfolio-items-->
        @endif
    </div>
</section>
@endforeach

<section id="kontakt" class="section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title text-center wow fadeInDown">Kontakt</h2>
        </div>
    </div>
</section>

<section id="kontaktformular">
    <div id="google-map" style="height:650px" data-latitude="47.6997985" data-longitude="16.0069443"></div>
    <div class="container-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-8">
                    <div class="contact-form">
                        <h3>Kontakt</h3>
                        <address>
                            <strong>{{ $configs['name'] }}</strong><br>
                            Franz-Samwald-Stra&szlig;e 16<br>
                            2630 Ternitz<br>
                            <span class="glyphicon glyphicon-phone" aria-hidden="true"></span> 0676 680 1998 <br>
                            <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> <a href="mailto:{{ $configs['email'] }}">{{ $configs['email'] }}</a>
                        </address>
                        {!! Form::open(['route' => 'inquiry']) !!}
                        <form id="main-contact-form" name="contact-form" method="post" action="#">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="Ihr Name" required>
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Ihre E-Mail-Adresse" required>
                            </div>
                            <div class="form-group">
                                <textarea name="message" class="form-control" rows="8" placeholder="Ihre Anfrage" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Anfrage absenden</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="impressum" class="section"style="background-image: url(images/imprint-bg.jpg);">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title text-center wow fadeInDown">Impressum</h2>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="media service-box">
                    <p class="text-center wow fadeInDown">
                        <strong>{{ $configs['name'] }}</strong><br>
                        <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> {{ $configs['street'] }}, {{ $configs['zip'] }} {{ $configs['city'] }}<br>
                        <span class="glyphicon glyphicon-phone" aria-hidden="true"></span> {{ $configs['phone'] }} <br>
                        <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> <a href="mailto:{{ $configs['email'] }}">{{ $configs['email'] }}</a><br>
                        {{ $configs['atu'] }}
                    </p>
                </div>
            </div>
        </div>
</section>
<section id="cta0">
    <div class="container">
        <div class="text-center">
            <h2 class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="0ms">

            </h2>
            <p class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="100ms"></p>
            <p class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="200ms">&nbsp;</p>

        </div>
    </div>
</section>
@endsection
