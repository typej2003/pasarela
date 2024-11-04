<div>
        <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.rtl.min.css" integrity="sha384-WJUUqfoMmnfkBLne5uxXj+na/c7sesSJ32gI7GfCk4zO4GthUKhSEGyvQ839BC51" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/03cf5139f1.js"></script>

    <link rel="stylesheet" href="/css/pasarela.css" class="rel">

    <head>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

        <script src="/js/variables.js"></script>
        <script src="/js/selectMetodoPagoPasarela.js"></script>
        
    </head> 
    <style>
    .ui-autocomplete {
        max-height: 220px;
        overflow-y: auto;
        /* prevent horizontal scrollbar */
        overflow-x: hidden;
    }
    /* IE 6 doesn't support max-height
     * we use height instead, but this forces the menu to always be this tall
     */
    * html .ui-autocomplete {
        height: 220px;
    }
</style>
<section class="banner">
    <div class="row">
        <div class="col-lg-12">
            <nav class="nav w-100">
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <a href="/"><img class="img_logo" src="/img/logo_01.png" alt=""></a>
        </div>
    </div>
</section>
<div class="container-fluid">
    <div class="d-flex justify-content-between mb-2 my-3">
        <button wire:click.prevent="addNew" class="btn btn-primary"><i class="fa fa-plus-circle mr-1"></i> Nuevo Usuario</button>
        <div></div>
    </div>
</div>
<div class="container-fluid d-flex flex-row">
    <div class="card mx-auto" style="width: 32rem;">
        <div class="card-body">
            <div class="row">
                <div class="form-group">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <script> var comercio_id = 0; comercio_id = "{{ $comercio_id }}"; </script>
                    <label for="cedula">Cédula </label>
                    <input id="identificationNumber0" type="text" autofocus class="cedula form-control inputForm @error('identificationNumber0') is-invalid @enderror" aria-describedby="cedulaHelp" placeholder="Cédula" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" value="{{ old('identificationNumber0') }}">
                    @error('identificationNumber0')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>  
                <script>
                    $('#identificationNumber0').on('input', function () { 
                        this.value = this.value.replace(/[^0-9]/g,'');
                    });
                </script>
                <div class="group-control">
                    <label for="clienteName">Nombre</label>
                    <input type="text" id="clienteName" class="form-control inputForm" placeholder="Nombre">
                </div>
                <div id="verifica" class="group-control text-center negrita d-none">
                    <a class="" data-bs-toggle="modal" data-bs-target="#formUser" style="cursor: pointer;">Crear Cuenta</a>
                </div>
            </div>
            <div class="row my-3">
                <div class="col-lg-12" wire:ignore>
                    <div class="divPrincipal" id="divPrincipal"></div>
                </div>
            </div>
            
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="formUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog" role="document">
        <form autocomplete="off" wire:submit.prevent="{{ $showEditModal ? 'updateUser' : 'createUser' }}">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        @if($showEditModal)
                        <span>Editar Usuarios</span>
                        @else
                        <span>Nuevo Usuario</span>
                        @endif
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Rol</label>
                        <select name="" wire:model.defer="state.role" class="form-control @error('role') is-invalid @enderror" id="">
                            <option value="0">SELECCIONE..</option>
                            <option value="afiliado">AFILIADO</option>
                            <option value="cliente">CLIENTE</option>
                        </select>
                        @error('role')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="row mx-auto">
                            <div class="col-xs-6 col-md-4 col-sm-4 col-4">
                                <label for="identificationNac">Tipo </label>
                                <select wire:model.defer="state.identificationNac" class="form-control inputForm inputType @error('identificationNac') is-invalid @enderror" name="identificationNac" id="identificationNac" placeholder="Tipo">
                                    <option value="0">SELECCIONE..</option>
                                    <option value="V">V-</option>
                                    <option value="J">J-</option>
                                    <option value="E">E-</option>
                                    <option value="G">G-</option>
                                    <option value="P">P-</option>                                    
                                </select>
                                @error('identificationNac')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-xs-6 col-md-8 col=sm-8 col-8">
                                <label for="identificationNumber">Documento</label>
                                <input wire:model.defer="state.identificationNumber" class="form-control @error('identificationNumber') is-invalid @enderror" type="text" id="identificationNumber" name="identificationNumber"  placeholder="Documento">
                                @error('identificationNumber')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>                        
                    </div>

                    <div class="form-group">
                        <label for="name">Usuario</label>
                        <input type="text" wire:model.defer="state.name" class="form-control @error('name') is-invalid @enderror" id="name" aria-describedby="nameHelp" placeholder="Nombre de usuario">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Correo Electrónico</label>
                        <input type="text" wire:model.defer="state.email" class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="emailHelp" placeholder="Introduce el email">
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" wire:model.defer="state.password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Contraseña">
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="passwordConfirmation">Confirme la Contraseña</label>
                        <input type="password" wire:model.defer="state.password_confirmation" class="form-control" id="passwordConfirmation" placeholder="Confirme la Contraseña">
                    </div>

                    <div class="row mx-auto">
                        <div class="col-xs-6 col-md-4 col-sm-4 col-4">
                        <label for="cellphonecode">Operadora</label>
                            <select wire:model.defer="state.cellphonecode" class="form-control @error('cellphonecode') is-invalid @enderror inputForm inputType" name="" id="cellphonecode">
                                <option value="0">Seleccione</option>
                                <option value="0412">0412</option>
                                <option value="0414">0414</option>
                                <option value="0424">0424</option>
                                <option value="0416">0416</option>
                                <option value="0426">0426</option>
                            </select>
                            @error('cellphonecode')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-xs-6 col-md-8 col-sm-8 col-8">
                        <label for="cellphone">Operadora</label>
                            <input type="text" wire:model.defer="state.cellphone" class="form-control @error('cellphone') is-invalid @enderror " name="" id="cellphone">
                            @error('cellphone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="address">Dirección</label>
                        <input type="address" wire:model.defer="state.address" class="form-control @error('address') is-invalid @enderror" id="address" placeholder="Dirección">
                        @error('address')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="customFile">Foto de Perfil</label>
                        <div class="custom-file">
                            <div x-data="{ isUploading: false, progress: 5 }" x-on:livewire-upload-start="isUploading = true" x-on:livewire-upload-finish="isUploading = false; progress = 5" x-on:livewire-upload-error="isUploading = false" x-on:livewire-upload-progress="progress = $event.detail.progress">
                                <input wire:model="photo" type="file" class="custom-file-input" id="customFile">
                                <div x-show.transition="isUploading" class="progress progress-sm mt-2 rounded">
                                    <div class="progress-bar bg-primary progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" x-bind:style="`width: ${progress}%`">
                                        <span class="sr-only">40% Completo (exito)</span>
                                    </div>
                                </div>
                            </div>
                            <label class="custom-file-label" for="customFile">
                                @if ($photo)
                                {{ $photo->getClientOriginalName() }}
                                @else
                                Seleccione la foto
                                @endif
                            </label>
                        </div>

                        @if ($photo)
                        <img src="{{ $photo->temporaryUrl() }}" class="img d-block mt-2 w-100 rounded">
                        @else
                        <img src="{{ $state['avatar_url'] ?? '' }}" class="img d-block mb-2 w-100 rounded">
                        @endif
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times mr-1"></i> Cancelar</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-1"></i>
                        @if($showEditModal)
                        <span>Guardar Cambios</span>
                        @else
                        <span>Guardar</span>
                        @endif
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    let divPrincipal = document.getElementById('divPrincipal')
    divPrincipal.appendChild(selectMetodoPago(0))  
    
    comercio_id = @this.comercio_id
    
    window.addEventListener('show-formUser', function (event) {
        $('#formUser').modal('show');
    });
    window.addEventListener('hide-formUser', function (event) {
        $('#formUser').modal('hide');
        document.querySelector('#identificationNumber0').value = event.detail.identificationNumber
        document.querySelector('#clienteName').value = event.detail.name
        
    });
</script>

<script>
    
    $("#identificationNumber0").keyup(function(){
        if($(this).val().length > 0 ){
            $("#identificationNumber0").css("background-color", "#B3B4E2");
        }else{
            $("#identificationNumber0").css("background-color", "#fff");
        }
        
    });
    
    var path = "{{ route('autocomplete-cliente') }}";
      
    $( "#identificationNumber0" ).autocomplete({
          source: function( request, response ) {
            $.ajax({
              url: path,
              type: 'GET',
              dataType: "json",
              data: {
                   search: request.term,
                   campo: 'cedula',
                },
              success: function( data2 ) {
                response( data2 );                
                let verifica = document.querySelector('#verifica')
                if(data2.length == 0){
                    verifica.classList.remove('d-none')
                }else{
                    verifica.classList.add('d-none')   
                    document.querySelector('#clienteName').value = ""
                    email =  ""
                    identificationNac = "0"
                    identificationNumber = ""
                    cellphone = ""
                    cellphonecode = "0"
                    cliente_id = 0;
                }
              }
            });
          },
          select: function (event, ui) {            
             $('#identificationNumber0').val(ui.item.identificationNumber);
             cliente_id = ui.item.identi
             email =  ui.item.email
             identificationNac = ui.item.identificationNac
             identificationNumber = ui.item.identificationNumber
             cellphone = ui.item.cellphone
             cellphonecode = ui.item.cellphonecode

             $('#temp').val(ui.item.identificationNumber);

             $('#clienteName').val(ui.item.nombre);
             
          }
    });

    

    window.addEventListener('hide-form-pasarela', event => {

        $('#clienteName').val(event.detail.name);

        $('#identificationNumber0').val(event.detail.identificationNumber);

        $('#form').modal('hide');
        toastr.success(event.detail.message, 'Success!');

    });

    

</script>

>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</div>
