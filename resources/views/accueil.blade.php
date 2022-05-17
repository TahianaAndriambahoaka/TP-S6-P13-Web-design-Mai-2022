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
<div class="bgded overlay padtop animate__animated animate__fadeIn" style="background-image:url('/images/rechauffement-climatique1.jpg');">
  @include('header')
  <div id="pageintro" class="hoc clear"> 
    <article>
      <h1 class="heading animate__animated animate__fadeInLeft">Mais c'est quoi?</h1>
      <p class='animate__animated animate__fadeInRight'>Grâce aux travaux du GIEC et des autres scientifiques qui travaillent sur la définition du réchauffement climatique, on comprend désormais mieux les conséquences de ce phénomène sur notre vie. Dans l’esprit de beaucoup, le réchauffement climatique est un problème relativement lointain qui implique simplement qu’il va faire plus chaud. Mais en fait, les conséquences sont beaucoup plus profondes.</p>
    </article>
  </div>
</div>
<div class="wrapper row3" id="details">
  <main class="hoc container clear"> 
    <!-- main body -->
    <section id="services">
      <div class="sectiontitle">
        <h2 class="heading">Voici les plus récentes articles sur le réchauffement climatique</h2>
      </div>
      <ul class="nospace group grid-3">
        <li class="one_third animate__animated animate__fadeInRight">
          <article><a href="causes"><i class="fas fa-question"></i></a>
            <h3 class="heading">les causes</h3>
            <p>Mais quelles sont les causes du réchauffement climatique?</p>
            <footer><a href="causes">Voir plus &raquo;</a></footer>
          </article>
        </li>
        <li class="one_third animate__animated animate__fadeInDown">
          <article><a href="consequences"><i class="fas fa-exclamation"></i></a>
            <h3 class="heading">Les conséquences</h3>
            <p>Voyons ici nous pouvons voir les conséquences du réchauffement climatique.</p>
            <footer><a href="consequences">Voir plus &raquo;</a></footer>
          </article>
        </li>
        <li class="one_third animate__animated animate__fadeInLeft">
          <article><a href="solutions"><i class="fas fa-lightbulb"></i></a>
            <h3 class="heading">Les solutions</h3>
            <p>Ici ce sont les solutions proposées fâce au réchauffement climatique.</p>
            <footer><a href="solutions">Voir plus &raquo;</a></footer>
          </article>
        </li>
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