<div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Perfil</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">Inicio</a></li>
                        <li class="breadcrumb-item active"><a href="/users">Usuarios</a></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center" x-data="{ imagePreview: '{{ $user->avatar_url }}' }">
                                <input wire:model="image" type="file" class="d-none" x-ref="image" x-on:change="
                                        reader = new FileReader();
                                        reader.onload = (event) => {
                                            imagePreview = event.target.result;
                                            document.getElementById('profileImage').src = `${imagePreview}`;
                                        };
                                        reader.readAsDataURL($refs.image.files[0]);
                                    " />
                                <img x-on:click="$refs.image.click()" class="profile-user-img img-circle" x-bind:src="imagePreview ? imagePreview : '/backend/dist/img/user4-128x128.jpg'" alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center">{{ $user->name }}</h3>

                            <p class="text-muted text-center">{{ $user->rol() }}</p>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card" x-data="{ currentTab: $persist('profile') }">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills" wire:ignore>
                                <li @click.prevent="currentTab = 'profile'" class="nav-item"><a class="nav-link" :class="currentTab === 'profile' ? 'active' : ''" href="#profile" data-toggle="tab"><i class="fa fa-user mr-1"></i> Editar Perfil</a></li>
                                <li @click.prevent="currentTab = 'changePassword'" class="nav-item"><a class="nav-link" :class="currentTab === 'changePassword' ? 'active' : ''" href="#changePassword" data-toggle="tab"><i class="fa fa-key mr-1"></i> Cambiar
                                        Contraseña</a></li>
                                <li @click.prevent="currentTab = 'changeDatosBasicos'" class="nav-item"><a class="nav-link" :class="currentTab === 'changeDatosBasicos' ? 'active' : ''" href="#changeDatosBasicos" data-toggle="tab"><i class="fas fa-regular fa-address-card mr-1"></i> Datos
                                Básicos</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane" :class="currentTab === 'profile' ? 'active' : ''" id="profile" wire:ignore.self>
                                    <form wire:submit.prevent="updateProfile" class="form-horizontal">
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                            <div class="col-sm-10">
                                                <input wire:model.defer="state.name" type="text" class="form-control @error('name') is-invalid @enderror" id="inputName" placeholder="Name">
                                                @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input wire:model.defer="state.email" type="email" class="form-control @error('email') is-invalid @enderror" id="inputEmail" placeholder="Email">
                                                @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" class="btn btn-success"><i class="fa fa-save mr-1"></i> Guardar Cambios</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="tab-pane" :class="currentTab === 'changePassword' ? 'active' : ''" id="changePassword" wire:ignore.self>
                                    <form wire:submit.prevent="changePassword" class="form-horizontal">
                                        <div class="form-group row">
                                            <label for="newPassword" class="col-sm-3 col-form-label">Nueva
                                                Contraseña</label>
                                            <div class="col-sm-9">
                                                <input wirse:model.defer="state.password" type="password" class="form-control @error('password') is-invalid @enderror" id="newPassword" placeholder="New Password">
                                                @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <div class="offset-sm-3 col-sm-9">
                                                <button type="submit" class="btn btn-success"><i class="fa fa-save mr-1"></i> Guardar Cambios</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="tab-pane" :class="currentTab === 'changeDatosBasicos' ? 'active' : ''" id="changeDatosBasicos" wire:ignore.self>
                                    <form wire:submit.prevent="updateDatosBasicos" class="form-horizontal">
                                        <div class="form-group row">
                                            <div class="row mx-auto">
                                                <div class="col-xs-6 col-md-4 col-sm-4 col-4">
                                                    <label for="cellphonecode" class="col-form-label">Operadora</label>
                                                    <select wire:model.defer="state.cellphonecode" class="form-control" name="" id="cellphonecode">
                                                        <option value="0">Seleccione</option>
                                                        <option value="0412">0412</option>
                                                        <option value="0414">0414</option>
                                                        <option value="0424">0424</option>
                                                        <option value="0416">0416</option>
                                                        <option value="0426">0426</option>
                                                    </select>
                                                </div>
                                                <div class="col-xs-6 col-md-8 col-sm-8 col-8">
                                                    <label for="cellphone" class="col-form-label">Teléfono</label>
                                                    <input wire:model.defer="state.cellphone" type="text" class="form-control" id="cellphone">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputAddress" class="col-sm-2 col-form-label">Dirección</label>
                                            <div class="col-sm-10">
                                                <input wire:model.defer="state.address" type="text" class="form-control @error('address') is-invalid @enderror" id="inputAddress" placeholder="Dirección">
                                                @error('address')
                                                <div class="invalid-feedback">
                                                    {{ $message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" class="btn btn-success"><i class="fa fa-save mr-1"></i> Guardar Cambios</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

</div>

@push('styles')
<style>
    .profile-user-img:hover {
        background-color: blue;
        cursor: pointer;
    }
</style>
@endpush

@push('alpine-plugins')
<!-- Alpine Plugins -->
<script defer src="https://unpkg.com/@alpinejs/persist@3.x.x/dist/cdn.min.js"></script>
@endpush

@push('js')
<script>
    $(document).ready(function () {
        Livewire.on('nameChanged', (changedName) => {
            $('[x-ref="username"]').text(changedName);
        })
    });
</script>
@endpush
