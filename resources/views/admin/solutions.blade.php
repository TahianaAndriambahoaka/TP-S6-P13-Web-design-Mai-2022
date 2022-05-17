<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Administrateur | Réchauffement climatique</title>
</head>

<body>
  <div class="container-scroller">
    <!-- partial:admin/template/partials/_navbar.html -->
    @include('admin.header')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:admin/template/partials/_settings-panel.html -->
      <!-- partial -->
      <!-- partial:admin/template/partials/_sidebar.html -->
      @include('admin/nav-gauche')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-8 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Rechercher un article</h4>
                  <form action="/administrateur/solutions" method="post">
                    @csrf
                    <div class="form-group">
                      <div class="input-group">
                        <input type="text" class="form-control" placeholder="Écrivez ici ce qui vous passe dans la tête..." name="motcle">
                        <div class="input-group-append">
                          <input type='submit' class="btn btn-sm btn-primary" value='Rechercher'/>
                        </div>
                      </div>
                    </div>
                  </form>
                  <br><br>
                  <div class="table-responsive">
                    @if ($message = Session::get('insertok'))
                        <p>{{$message}}</p>
                    @endif
                    @if ($message = Session::get('erreur'))
                        <p>{{$message}}</p>
                    @endif
                    @if ($message = Session::get('deleteok'))
                        <p>{{$message}}</p>
                    @endif
                    @if ($message = Session::get('erreur'))
                        <p>{{$message}}</p>
                    @endif
                    @if ($message = Session::get('updateok'))
                        <p>{{$message}}</p>
                    @endif
                    @if ($message = Session::get('erreur'))
                        <p>{{$message}}</p>
                    @endif
                    @if (isset($info))
                      <h4 style="font-weight: bold">Modification d'article</h4><br>
                      <form action="/administrateur/solutions/modifier" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$info[0]->id}}">
                        <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">Titre</span>
                            </div>
                            <input type="text" class="form-control" aria-label="Username" name="titre" value="{{$info[0]->titre}}">
                          </div>
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                              <label for="exampleTextarea1">Contenu</label>
                              <textarea class="form-control" placeholder="Écrivez ici le contenu de votre article..." id="exampleTextarea1" rows="4" name="contenu">{{$info[0]->contenu}}</textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Modifier</button>
                      </form>
                      
                    @else
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>Titre</th>
                            <th>Contenu</th>
                            <th></th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          @for ($i = 0; $i < count($data); $i++)
                            <tr>
                              <td>{{$data[$i]->titre}}</td>
                              <td>
                                @if ( strlen($data[$i]->contenu) >= 40)
                                  {{ substr($data[$i]->contenu, 0, 40)."..." }}
                                @else
                                  {{ $data[$i]->contenu }}
                                @endif
                              </td>
                              <td style='text-align:center'><a href="/administrateur/solutions/{{str_slug($data[$i]->titre,'-')}}-{{$data[$i]->id}}/modification"><i class="mdi mdi-table-edit" style='color:orange; font-size:2em'></i></a></td>
                              <td style='text-align:center'><a href="/administrateur/solutions/{{str_slug($data[$i]->titre,'-')}}-{{$data[$i]->id}}/suppression"><i class="mdi mdi-delete-forever" style='color:red; font-size:2em'></i></a></td>
                            </tr>
                          @endfor
                        </tbody>
                      </table>
                    @endif
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Ajout d'article</h4>
                  <p class="card-description">
                    Quelles sont alors les initiatives prises fâce à ce réchauffement climatique?
                  </p>
                    <form action="/administrateur/solutions/ajouter" method="post" enctype='multipart/form-data'>
                      @csrf
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Titre</span>
                          </div>
                          <input type="text" class="form-control" placeholder="Titre de l'article" aria-label="Username" name="titre">
                        </div>
                      </div>
                      <div class="form-group">
                          <div class="form-group">
                            <label for="exampleTextarea1">Contenu</label>
                            <textarea class="form-control" placeholder="Écrivez ici le contenu de votre article..." id="exampleTextarea1" rows="4" name="contenu"></textarea>
                          </div>
                      </div>
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Image</span>
                          </div>
                          <input type="file" class="form-control" name="image">
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary mr-2">Insérer</button>
                      @if ($message = Session::get('insertok'))
                          <p>{{$message}}</p>
                      @endif
                      @if ($message = Session::get('erreur'))
                          <p>{{$message}}</p>
                      @endif
                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:admin/template/partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  
  <link rel="stylesheet" href="{{asset('admin/template/vendors/feather/feather.css')}}">
  <link rel="stylesheet" href="{{asset('admin/template/vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{asset('admin/template/vendors/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{asset('admin/template/css/vertical-layout-light/style.css')}}">
  <link rel="stylesheet" href="{{asset('admin/template/vendors/mdi/css/materialdesignicons.min.css')}}">
  <link rel="shortcut icon" href="{{asset('admin/template/images/favicon.png')}}" />
  <script src="{{asset('admin/template/vendors/js/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{asset('admin/template/js/off-canvas.js')}}"></script>
  <script src="{{asset('admin/template/js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('admin/template/js/template.js')}}"></script>
  <script src="{{asset('admin/template/js/settings.js')}}"></script>
  <script src="{{asset('admin/template/js/todolist.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
</body>

</html>
