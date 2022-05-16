<!DOCTYPE html>
<html lang="">
<head>
<title>Réchauffement climatique</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="{{asset('layout/styles/layout.css')}}" rel="stylesheet" type="text/css" media="all">
<link href="{{asset('css/animate.min.css')}}" rel="stylesheet" type="text/css" media="all">
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
      <div class="sectiontitle">
        <h6 class="heading">Voici les initiatives prises fâce au réchauffement climatique</h6>
      </div>
      <ul class="nospace group grid-3 animate__animated animate__fadeInRight">
        @for ($i = 0; $i < count($articles); $i++)
          <li class="one_third animate__animated animate__pulse">
            <article><a href="{{ 'solutions/'.str_slug($articles[$i]->titre,'-').'-'.$articles[$i]->id }}"><i class="fas fa-question"></i></a>
              <h6 class="heading">{{ $articles[$i]->titre }}</h6>
              <p>
                @if ( strlen($articles[$i]->contenu) >= 75)
                  {{ substr($articles[$i]->contenu, 0, 75)."..." }}
                @else
                  {{ $articles[$i]->contenu }}
                @endif
              </p>
              <footer><a href="{{ 'solutions/'.str_slug($articles[$i]->titre,'-').'-'.$articles[$i]->id }}">Plus d'informations &raquo;</a></footer>
            </article>
          </li>
        @endfor
      </ul>
    </section>
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>
@include('footer')
<a id="backtotop" href="#top"><i class="fas fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="{{asset('layout/scripts/jquery.min.js')}}"></script>
<script src="{{asset('layout/scripts/jquery.backtotop.js')}}"></script>
<script src="{{asset('layout/scripts/jquery.mobilemenu.js')}}"></script>
</body>
</html>