<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.rtl.min.css" integrity="sha384-WJUUqfoMmnfkBLne5uxXj+na/c7sesSJ32gI7GfCk4zO4GthUKhSEGyvQ839BC51" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/03cf5139f1.js"></script>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/modopago.css" class="rel">
    <title>PagoExpres</title>
    <style>
        .dropdown-menu {
            text-align: left !important;
            }
    </style>

    <style>
      
    </style>
  </head>
  <body class="">
   <!--ENCABEZADO--> 
   <?php echo $__env->make('layouts.partials.navbarwelcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <section id="container-slider">    
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="/img/slider/slider1.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="/img/slider/slider2.png" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <section class="body">

    </section>

    <div class="footer container-fluid">  
        <div class="row">
                <div class="col-md-3 my-1">
                    <span><img class="img-fluid footer-img" style="width: 60%" src="/img/LOGO_DDR.png" alt=""></span>
                </div>
                <div class="col-md-3 my-1 text-white">
                    <span>COPYRIGHT &copy; 2024 DDR SISTEMAS C.A. RIF: J-31512955-8</span>
                    <span>V1.0.0 PV2</span>
                </div>
                <div class="col-md-6 my-1">
                    <span><img class="img-fluid footer-img2" src="img/LOGO_BANCO.png" alt=""></span>
                </div>
        </div>
    </div>
    
    
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  
  </body>
</html>

<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content modalFondo">
      <div class="modal-header" style="background-color: #f8f8f8;">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <section class="banner">
            <div class="row">
                <div class="col-lg-12">
                    <img class="img_logo" src="./img/logo_01.png" alt="">
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
            
                    <form action="<?php echo e(route('login')); ?>" method="POST">
                      <?php echo csrf_field(); ?>
                      <div class="form-group">
                        <div class="row mx-auto">
                            <div class="col-xs-6 col-md-4 col-sm-4 col-4">
                                <label for="tipodocumento">Tipo </label>
                                <select class="form-control inputForm inputType" name="" id="identificationNac" placeholder="Tipo">
                                    <option value="J">J-</option>
                                    <option value="E">E-</option>
                                    <option value="G">G-</option>
                                    <option value="P">P-</option>
                                    <option value="V" selected>V-</option>
                                </select>
                            </div>
                            <div class="col-xs-6 col-md-8 col=sm-8 col-8">
                                <label for="documento">Documento</label>
                                <input type="text" id="identificationNumber" class="form-control inputForm" placeholder="Documento">
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
                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                              <span class="text-danger"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
  <div class="modal-content modalFondo">
      <div class="modal-header" style="background-color: #f8f8f8;">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <section class="banner">
            <div class="row">
                <div class="col-lg-12">
                    <img class="img_logo" src="./img/logo_01.png" alt="">
                </div>
            </div>
        </section>
        <div class="container-fluid d-flex flex-row">
            <div class="card  mx-auto" style="width: 32rem;">
                <div class="card-body">
                  <div class="row">
                      <div class="col-lg-12 titulo c-a text-center h2 pt-3">Registrate a PagoExpress</div>
                      <p class="texto text-center">¿Ya tienes una cuenta? <span class="c-n">click Aquí</span></p>
                  </div>
        
                  <form action="<?php echo e(route('register')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <div class="row mx-auto">
                            <div class="col-xs-6 col-md-4 col-sm-4 col-4">
                                <label for="tipodocumento">Tipo </label>
                                <select class="form-control inputForm inputType" name="" id="identificationNac" placeholder="Tipo">
                                    <option value="J">J-</option>
                                    <option value="E">E-</option>
                                    <option value="G">G-</option>
                                    <option value="P">P-</option>
                                    <option value="V" selected>V-</option>
                                </select>
                            </div>
                            <div class="col-xs-6 col-md-8 col=sm-8 col-8">
                                <label for="documento">Documento</label>
                                <input type="text" id="identificationNumber" class="form-control inputForm" placeholder="Documento">
                            </div>
                        </div>
                        
                    </div>
                    <input type="hidden" name="role" value="afiliado">
                    <div class="form-group my-3">
                        <div class="row mx-auto">
                            <div class="col-xs-12 col-md-12 col-sm-12 col-12">
                                <input type="text" name="name" class="form-control inputForm" placeholder="Usuario">
                            </div>
                        </div>
                    </div>
            
                    <div class="form-group my-3">
                        <div class="row mx-auto">
                            <div class="col-xs-12 col-md-12 col-sm-12 col-12">
                                <input type="email" name="email" class="form-control inputForm" placeholder="Email">
                            </div>
                        </div>
                    </div>
                    <div class="form-group my-3">
                        <div class="row mx-auto">
                            <div class="col-xs-12 col-md-12 col-sm-12 col-12">
                                <input type="password" name="password" class="form-control inputForm" placeholder="Contraseña" value="12345678">                    
                            </div>
                        </div>
                    </div>
            
                    <div class="form-group my-3">
                        <div class="row mx-auto">
                            <div class="col-xs-12 col-md-12 col-sm-12 col-12">
                                <input type="password" name="password_confirmation" class="form-control inputForm" placeholder="Confirme la Contraseña" value="12345678">                        
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="row mx-auto my-3">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <button type="submit" class="btn boton1 w-100">Unete Ya</button>
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
</script><?php /**PATH C:\Users\Personal\Documents\Proyectos\github\pasarela\resources\views/welcome.blade.php ENDPATH**/ ?>