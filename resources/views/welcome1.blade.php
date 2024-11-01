<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.rtl.min.css" integrity="sha384-WJUUqfoMmnfkBLne5uxXj+na/c7sesSJ32gI7GfCk4zO4GthUKhSEGyvQ839BC51" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/03cf5139f1.js"></script>
    <link rel="stylesheet" href="css/estilos.css" />
    <link rel="stylesheet" href="/css/modopago.css" class="rel">
    <title>Diseño y Soluciones</title>
    <style>
        .dropdown-menu {
            text-align: left !important;
            }
    </style>

    <style>
      *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
#container-slider
{
    position: relative;
    display: block;
    width: 100%;
}
#slider {
    position: relative;
    display: block;
    width: 100%;
    height: 20vh;
    min-height: 500px;
}
#slider li {
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    position: absolute !important;
    top: 0 !important;
    left: 0 !important;
    width: 100%;
    height: 100%;
    display: block;
    -webkit-transition: opacity 1s;
    -moz-transition: opacity 1s;
    -ms-transition: opacity 1s;
    -o-transition: opacity 1s;
    transition: opacity 1s;
    z-index: -1;
    opacity: 0;
}
#container-slider .arrowPrev, #container-slider .arrowNext{
    font-size: 30pt;
    color: rgba(204, 204, 204, 0.65);
    cursor: pointer;
    position: absolute;
    top: 50%;
    left: 50px;
    z-index: 2; 
}
#container-slider .arrowNext {
    left: initial;
    right: 50px !important;
}
.content_slider{
    padding: 15px 30px;
    color: #FFF;
    width: 100%;
    height: 100%;
}
.content_slider div{
    text-align: center;
}
.content_slider h2{
    font-family: 'arial';
    font-size: 30pt;
    letter-spacing: 1px;
    text-transform: uppercase;
    margin-bottom: 20px;
}
.content_slider p {
    font-size: 15pt;
    font-family: 'arial';
    color: #FFF;
    margin-bottom: 20px;
}
#slider li .content_slider{
    background: rgba(0, 0, 0, 0.50);
    padding: 10px 125px;
}
.content_slider{
    display: -webkit-flex;
    display: -moz-flex;
    display: -ms-flex;
    display: -o-flex;
    display: flex;
    justify-content: center;
    align-items: center;
}
.btnSlider{
    color: #FFF;
    font-size: 15pt;
    font-family: 'arial';
    letter-spacing: 1px;
    padding: 10px 50px;
    border: 1px solid #CCC;
    background: rgba(37, 40, 80, 0.55);
    border-radius: 31px;
    text-decoration: none;
    transition: .5s all;
}
.btnSlider:hover{
    background: #111;
    border: 1px solid #111;
}
.listslider {
    position: absolute;
    display: -webkit-flex;
    display: -moz-flex;
    display: -ms-flex;
    display: -o-flex;
    display: flex;
    justify-content: space-between;
    align-items: center;
    left: 50%;
    bottom: 5%;
    list-style: none;
    z-index: 2;
    transform: translateX(-50%);
}
.listslider li {
    border-radius: 50%;
    width: 10px;
    height: 10px;
    cursor: pointer;
    margin: 0 5px;
}
.listslider li a {
    background: #CCC;
    border-radius: 50%;
    width: 100%;
    height: 100%;
    display: block;
}
.item-select-slid {
    background: #FFF  !important;
}

@media screen and (max-width: 460px){
    .content_slider h2 {
        font-size: 15pt !important;
    }
    .content_slider p {
        font-size: 12pt !important;
    }
    #container-slider .arrowPrev, #container-slider .arrowNext{
        font-size: 20pt;
    }
    #container-slider .arrowPrev{
        left: 15px;
    }
    #container-slider .arrowNext{
        right: 15px !important;
    }
    #slider{
        height: 400px;
        min-height: 400px;
    }
    #slider li .content_slider{
        padding: 10px 35px;
    }
    .btnSlider{
        padding: 10px 30px;
        font-size: 10pt;
    }

}
    </style>
  </head>
  <body>
   <!--ENCABEZADO--> 
   <header>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background: rgb(51, 71, 86)">
      <div class="container-fluid">
          <a class="navbar-brand" href="#">Pasarela DDRSISTEMAS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav d-flex mb-2 mb-lg-0 w-75 d-flex justify-content-around">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.html">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Portafolio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Conocenos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="#">Algo mas</a>
            </li>
          </ul>
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item dropdown">
              <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Perfil
              </a>
              <ul class="dropdown-menu">
                  <li class="mx-2">
                      <div class="d-flex justify-content-between mb-2">
                          <img src="/assets/img/icon_soporte.png" style="width: 18px; height: 25px;">
                          <a class="dropdown-item" href="#">Soporte en Línea</a>
                      </div>
                  </li>
                  <li class="mx-2">
                      <div class="d-flex justify-content-between mb-2">
                          <img src="/assets/img/icon_registrarse.png" style="width: 18px; height: 25px;">
                          
                          <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#registerModal" style="cursor: pointer;">Registrarse</a>

                      </div>
                  </li>

                  
                  <li class="mx-2">
                      <div class="d-flex justify-content-between mb-2">
                          <img src="/assets/img/icon_entrar.png" style="width: 18px; height: 25px;">

                          <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#loginModal" style="cursor: pointer;">Entrar</a>

                      </div>
                  </li>            
              </ul>
            </li>
          </ul>
          <!--<form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>-->
        </div>
      </div>
    </nav>
   </header> 
   <section id="container-slider">    
    <a href="javascript: funcionEjecutar('anterior');" class="arrowPrev"><i class="fas fa-chevron-circle-left"></i></a>
    <a href="javascript: funcionEjecutar('siguiente');" class="arrowNext"><i class="fas fa-chevron-circle-right"></i></a>
    <ul class="listslider">
      <li><a itlist="itList_0" href="#" class="item-select-slid"></a></li>
      <li><a itlist="itList_1" href="#"></a></li>
    </ul>
    <ul id="slider">
      <li style="background-image: url('img/slide/slide1.png'); z-index:0; opacity: 1;">
        <div class="content_slider" >
          <div>
            <h2>Imagen 1</h2>
        <p>Escribe el texto que aparecerá sobre la imagen número 1.</p>
        <a href="https://www.migueltroyano.com" target="_blank" class="btnSlider">Acceder</a>
      </div>
        </div>
      </li>
      <li style="background-image: url('img/slide/slide2.png'); ">
        <div class="content_slider" >
          <div>
            <h2>Imagen 2</h2>
        <p>Escribe el texto que aparecerá sobre la imagen número 2</p>
        <a href="https://www.migueltroyano.com" target="_blank" class="btnSlider">Acceder</a>
      </div>
        </div>
      </li>
    </ul>
  </section>
   <section id="container-slider">    
    <a href="javascript: funcionEjecutar('anterior');" class="arrowPrev"><i class="fas fa-chevron-circle-left"></i></a>
    <a href="javascript: funcionEjecutar('siguiente');" class="arrowNext"><i class="fas fa-chevron-circle-right"></i></a>
    <ul class="listslider">
      <li><a itlist="itList_0" href="#" class="item-select-slid"></a></li>
      <li><a itlist="itList_1" href="#"></a></li>
      <li><a itlist="itList_2" href="#"></a></li>
    </ul>
    <ul id="slider">
      <li style="background-image: url('imagenes/01.jpg'); z-index:0; opacity: 1;">
        <div class="content_slider" >
          <div>
            <h2>Imagen 1</h2>
        <p>Escribe el texto que aparecerá sobre la imagen número 1.</p>
        <a href="https://www.migueltroyano.com" target="_blank" class="btnSlider">Acceder</a>
      </div>
        </div>
      </li>
      <li style="background-image: url('imagenes/02.jpg'); ">
        <div class="content_slider" >
          <div>
            <h2>Imagen 2</h2>
        <p>Escribe el texto que aparecerá sobre la imagen número 2</p>
        <a href="https://www.migueltroyano.com" target="_blank" class="btnSlider">Acceder</a>
      </div>
        </div>
      </li>
      <li style="background-image: url('imagenes/03.jpg'); ">
        <div class="content_slider" >
          <div>
            <h2>Imagen 3</h2>
        <p>Escribe el texto que aparecerá sobre la imagen número 3</p>
        <a href="https://www.migueltroyano.com" target="_blank" class="btnSlider">Acceder</a>
      </div>
        </div>
      </li>
    </ul>
  </section>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  
  </body>
</html>

<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #f8f8f8;">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <section class="banner">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="nav w-100">
                        
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <img class="img_logo" src="./designImage/logo_01.png" alt="">
                </div>
            </div>
        </section>
        <div class="container-fluid d-flex flex-row">
            <div class="card  mx-auto" style="width: 32rem;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12 titulo c-a text-center h2 pt-3">Ingresa a tu PagoExprés</div>
                        <p class="text-center textoreg">¿Todavía no te has registrado? <span><a href="#" class="c-n">Crea tu cuenta Aquí</a></span></p>
                    </div>
            
                    <form action="" class="">
                        <div class="form-group">
                            <div class="row mx-auto">
                                <div class="col-xs-6 col-md-4 col-sm-4 col-4">
                                    <label for="tipodocumento">Tipo </label>
                                    <select class="form-control inputForm inputType" name="" id="tipodocumento" placeholder="Tipo">
                                        <option value="J">J-</option>
                                        <option value="E">E-</option>
                                        <option value="G">G-</option>
                                        <option value="P">P-</option>
                                        <option value="V" selected>V-</option>
                                    </select>
                                </div>
                                <div class="col-xs-6 col-md-8 col=sm-8 col-8">
                                    <label for="documento">Documento</label>
                                    <input type="text" id="documento" class="form-control inputForm" placeholder="Documento">
                                </div>
                            </div>                        
                        </div>
            
                        <div class="form-group">
                            <div class="row mx-auto" >
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <label for="email">Correo Electrónico</label>
                                    <input type="email" name="email" class="form-control inputForm" placeholder="Correo Electrónico" id="email">
                                </div>
                            </div>                
                        </div>
            
                        <div class="form-group">
                            <div class="row mx-auto">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <label for="password">Contraseña</label>
                                    <input type="password" name="password" id="password-field" class="form-control inputForm" placeholder="Contraseña" value="12345678"/>
                                </div>
                            </div>                
                        </div>
                        
                        <div class="form-group">
                            <div class="row mx-auto my-3">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <button class="btn boton1 w-100">Iniciar Sesión Aquí</button>
                                </div>
                            </div>                
                        </div>
                        <p class="text-center c-a texto"><a href="#">¿Olvidé mi contraseña?</a></p>
                        
                    </form>
                </div>
            </div>

        </div>        
      </div>

      <div class="modal-footer" style="background-color: #eb6c0e;">
        Contactar a soporte si no puedes iniciar sesión
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #f8f8f8;">
        <div class="d-flex justify-content-between mb-2">
          <img data-bs-dismiss="modal" aria-label="Close" src="/assets/img/icon_entrar.png" style="width: 10%; cursor: pointer;">
          <img src="/assets/img/logo_panaexpres.png" style="width: 50%;">
          <img src="/bootstrap-icons/icons/envelope-fill.svg" style="width: 8%;">
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <div class="login-box container-fluid row justify-content-center my-5">

          @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session()->get('success') }}
            </div>
          @endif

          @if(session()->has('success_msg'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                      {{ session()->get('success_msg') }}
                  </div>
          @endif

          @if(session()->has('alert_msg'))
                      <div class="alert alert-warning alert-dismissible fade show" role="alert">
                          {{ session()->get('alert_msg') }}
                      </div>
          @endif

          @if(session()->has('alert_error'))
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          {{ session()->get('alert_error') }}
                      </div>
          @endif

          <form action="{{ route('register') }}" method="post">
           
            @csrf
            <input type="text" name="role" value="afiliado">
            <div class="input-group mb-3">
                <input type="text" name="name" class="form-control" placeholder="Usuario">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="input-group mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="input-group mb-3">
                <input type="password" name="password" class="form-control" placeholder="Contraseña" value="12345678">
                <div class="input-group-append">
                   <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="input-group mb-3">
                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirme la Contraseña" value="12345678">
                <div class="input-group-append">
                   <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
                @error('password_confirmation')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block"><span class="fas fa-user-plus"></span>Unete</button>
            </div>

          </form>
        </div>
      </div>

      <div class="modal-footer" style="background-color: #eb6c0e;">
        Contactar a soporte si no puedes iniciar sesión
      </div>
    </div>
  </div>
</div>

<script>
  if(document.querySelector('#container-slider')){
   setInterval('funcionEjecutar("siguiente")',5000);
}
//------------------------------ LIST SLIDER -------------------------
if(document.querySelector('.listslider')){
   let link = document.querySelectorAll(".listslider li a");
   link.forEach(function(link) {
      link.addEventListener('click', function(e){
         e.anteriorentDefault();
         let item = this.getAttribute('itlist');
         let arrItem = item.split("_");
         funcionEjecutar(arrItem[1]);
         return false;
      });
    });
}

function funcionEjecutar(side){
    let parentTarget = document.getElementById('slider');
    let elements = parentTarget.getElementsByTagName('li');
    let curElement, siguienteElement;

    for(var i=0; i<elements.length;i++){

        if(elements[i].style.opacity==1){
            curElement = i;
            break;
        }
    }
    if(side == 'anterior' || side == 'siguiente'){

        if(side=="anterior"){
            siguienteElement = (curElement == 0)?elements.length -1:curElement -1;
        }else{
            siguienteElement = (curElement == elements.length -1)?0:curElement +1;
        }
    }else{
        siguienteElement = side;
        side = (curElement > siguienteElement)?'anterior':'siguiente';

    }
    
    //PUNTOS INFERIORES
    let elementSel = document.getElementsByClassName("listslider")[0].getElementsByTagName("a");
    elementSel[curElement].classList.remove("item-select-slid");
    elementSel[siguienteElement].classList.add("item-select-slid");
    elements[curElement].style.opacity=0;
    elements[curElement].style.zIndex =0;
    elements[siguienteElement].style.opacity=1;
    elements[siguienteElement].style.zIndex =1;
}
</script>