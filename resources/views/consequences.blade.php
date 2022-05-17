<!DOCTYPE html>
<html lang="">
<head>
<title>Réchauffement climatique</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
</head>
<body id="top">
<!-- Top Background Image Wrapper -->
<div class="bgded overlay padtop animate__animated animate__fadeIn" style="background-color: white">
  @include('header')
</div>
<div class="wrapper row3">
  <main class="hoc container clear"> 
    <!-- main body -->
    <section id="services">
      @if (!isset($data))
        <div class="sectiontitle">
          <h1 class="heading">Voici les conséquences du réchauffement climatique</h1>
        </div>
        <ul class="nospace group grid-3 animate__animated animate__fadeIn">
          @for ($i = 0; $i < count($articles); $i++)
            <li class="one_third animate__animated animate__pulse">
              <article><a href="{{ '/consequences/'.str_slug($articles[$i]->titre,'-').'-'.$articles[$i]->id }}"><i class="fas fa-question"></i></a>
                <h2 class="heading">{{ $articles[$i]->titre }}</h2>
                <p>
                  @if ( strlen($articles[$i]->contenu) >= 75)
                    {{ substr($articles[$i]->contenu, 0, 75)."..." }}
                  @else
                    {{ $articles[$i]->contenu }}
                  @endif
                </p>
                <footer><a href="{{ '/consequences/'.str_slug($articles[$i]->titre,'-').'-'.$articles[$i]->id }}">Plus d'informations &raquo;</a></footer>
              </article>
            </li>
          @endfor
        </ul>
      @else
        <div>
          <div class="sectiontitle animate__animated animate__fadeInDown">
            <h1 class="heading">{{ $data[0]->titre }}</h1>
          </div>
          <div style='float:left; width:35%' class="animate__animated animate__fadeInLeft"><img src="{{ asset('images/'.$data[0]->image) }}" alt=""></div>
          <div style='float:left; width:60%; margin-left:5%' class="animate__animated animate__fadeInRight">
            <h2>Pourquoi {{ $data[0]->titre }}?</h2>
            <p>{{ $data[0]->contenu }}</p>
          </div>
        </div>
      @endif
    </section>
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>
@include('footer')
<a id="backtotop" href="#top"><i class="fas fa-chevron-up"></i></a>

<link href="{{asset('layout/styles/layout.css')}}" rel="stylesheet" type="text/css" media="all">
<link href="{{asset('css/animate.min.css')}}" rel="stylesheet" type="text/css" media="all">
<script src="{{asset('layout/scripts/jquery.min.js')}}"></script>
<script src="{{asset('layout/scripts/jquery.backtotop.js')}}"></script>
<script src="{{asset('layout/scripts/jquery.mobilemenu.js')}}"></script>
</body>
</html>