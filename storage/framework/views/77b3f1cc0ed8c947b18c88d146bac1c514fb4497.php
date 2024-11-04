<div>
    <style>
        .modal-body {
            min-height: 400px!important;
            height: auto;
        }
    </style>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Metodos de Pagos</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">Escritorio</a></li>
                        <li class="breadcrumb-item active">Comercios</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <?php if($comercio): ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card w-50">
                        <div class="row">
                            <div class="col-lg-6">
                                <span>Propietario: </span>
                            </div>
                            <div class="col-lg-6">
                                <span><?php echo e($comercio->getPropietario()->name); ?></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <span>Comercio: </span>
                            </div>
                            <div class="col-lg-6">
                                <span><?php echo e($comercio->name); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="d-flex justify-content-between mb-2">
                        <button wire:click.prevent="addNew" class="btn btn-primary"><i class="fa fa-plus-circle mr-1"></i> Nuevo Metodo</button>
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.search-input','data' => ['wire:model' => 'searchTerm']]); ?>
<?php $component->withName('search-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['wire:model' => 'searchTerm']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">
                                            Metodo de Pago
                                            <span wire:click="sortBy('metodopago')" class="float-right text-sm" style="cursor: pointer;">
                                                <i class="fa fa-arrow-up <?php echo e($sortColumnName === 'metodopago' && $sortDirection === 'asc' ? '' : 'text-muted'); ?>"></i>
                                                <i class="fa fa-arrow-down <?php echo e($sortColumnName === 'metodopago' && $sortDirection === 'desc' ? '' : 'text-muted'); ?>"></i>
                                            </span>
                                        </th>
                                        <th scope="col">Descripción</th>
                                        <th scope="col">Fecha de Registro</th>
                                        <th scope="col">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody wire:loading.class="text-muted">
                                    <?php $__empty_1 = true; $__currentLoopData = $metodosC; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $metodo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <th scope="row"><?php echo e($metodosC->firstItem() + $index); ?></th>
                                        <td>
                                            <?php echo e($metodo->metodo); ?>

                                        </td>
                                        <td>
                                            <?php echo e($metodo->description()); ?>

                                        </td>
                                        <td><?php echo e($metodo->created_at->toFormattedDate() ?? 'N/A'); ?></td>
                                        <td>
                                            <a href="/listTransacciones/<?php echo e($metodo->id); ?>">
                                            <i class="fa fa-solid fa-book mr-2"></i>
                                            </a>

                                            <a href="" wire:click.prevent="edit(<?php echo e($metodo); ?>)">
                                                <i class="fa fa-edit mr-2"></i>
                                            </a>

                                            <a href="" wire:click.prevent="confirmMetodoRemoval(<?php echo e($metodo->id); ?>)">
                                                <i class="fa fa-trash text-danger"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr class="text-center">
                                        <td colspan="5">
                                            <img src="https://42f2671d685f51e10fc6-b9fcecea3e50b3b59bdc28dead054ebc.ssl.cf5.rackcdn.com/v2/assets/empty.svg" alt="No results found">
                                            <p class="mt-2">No se encontro resultados</p>
                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            <?php echo e($metodosC->links()); ?>

                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->

    <!-- Modal -->
    <div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <form autocomplete="off" wire:submit.prevent="<?php echo e($showEditModal ? 'updateMetodo' : 'createMetodo'); ?>">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            <?php if($showEditModal): ?>
                            <span>Editar Método de Pago</span>
                            <?php else: ?>
                            <span>Nuevo Método de Pago</span>
                            <?php endif; ?>
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Método de Pago</label>
                            <select name="" id="metodoId" wire:model.defer="metodoId" class="form-control <?php $__errorArgs = ['metodoId'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" wire:change="changeDatos($event.target.value)">
                                <option value="0">Selecciona una opción</option>
                                <?php $__currentLoopData = $metodos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $metodo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($metodo->metodo); ?>"><?php echo e($metodo->metodopago); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['metodoId'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback">
                                <?php echo e($message); ?>

                            </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div style="display: <?php echo e($visible4); ?>"> <!-- Datos transferencia -->
                            <div class= "datosTransferencia">
                                <div class="form-group">
                                    <div class="row mx-auto">
                                        <div class="col-xs-6 col-md-4 col-sm-4 col-4">
                                            <label for="identificationNac">Tipo </label>
                                            <select wire:model.defer="state.identificationNac" class="form-control inputForm inputType <?php $__errorArgs = ['identificationNac'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="" id="identificationNac" placeholder="Tipo">
                                                <option value="0">Selecciona una opción</option>
                                                <option value="V">V-</option>
                                                <option value="J">J-</option>
                                                <option value="E">E-</option>
                                                <option value="G">G-</option>
                                                <option value="P">P-</option>
                                            </select>
                                            <?php $__errorArgs = ['identificationNac'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback">
                                                <?php echo e($message); ?>

                                            </div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                        <div class="col-xs-6 col-md-8 col=sm-8 col-8">
                                            <label for="identificationNumber">Documento</label>
                                            <input type="text" wire:model.defer="state.identificationNumber" class="form-control inputForm inputType <?php $__errorArgs = ['identificationNumber'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="identificationNumber" class="form-control inputForm" placeholder="Documento">
                                            <?php $__errorArgs = ['identificationNumber'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback">
                                                <?php echo e($message); ?>

                                            </div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>                        
                                </div>
                                <div class="form-group" wire:ignore>
                                    <label for="">Banco</label>
                                    <select name="" id="banco" wire:model.defer="state.banco" class="form-control <?php $__errorArgs = ['banco'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                        <option value="0">Selecciona una opción</option>
                                        <?php $__currentLoopData = $bancos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ban): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($ban->name); ?>"><?php echo e($ban->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['banco'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($message); ?>

                                    </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group">
                                    <label for="tipocuenta">Tipo de Cuenta</label>
                                    <select name="tipocuenta" id="tipocuenta" wire:model.defer="state.tipocuenta" class="form-control <?php $__errorArgs = ['tipocuenta'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" >
                                        <option value="0">Seleccione una opción</option>
                                        <option value="cuenta">Cuenta</option>
                                    </select>
                                    <?php $__errorArgs = ['tipocuenta'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($message); ?>

                                    </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group">
                                    <label for="nrocuenta">Instrumento</label>
                                    <input type="text" wire:model.defer="state.nrocuenta" class="form-control <?php $__errorArgs = ['nrocuenta'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="nrocuenta" aria-describedby="nrocuentaHelp" placeholder="Nro de Cuenta">
                                    <?php $__errorArgs = ['nrocuenta'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($message); ?>

                                    </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group">
                                    <label for="titular">Titular</label>
                                    <input type="text" wire:model.defer="state.titular" class="form-control <?php $__errorArgs = ['titular'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="titular" aria-describedby="titularHelp" placeholder="Titular">
                                    <?php $__errorArgs = ['titular'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($message); ?>

                                    </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>
                        <div style="display: <?php echo e($visible5); ?>"> <!-- Datos pagomovil -->
                            <div class= "datosPagomovil">
                                <div class="form-group">
                                    <div class="row mx-auto">
                                        <div class="col-xs-6 col-md-4 col-sm-4 col-4">
                                            <label for="cellphonecode">Operadora </label>
                                            <select wire:model.defer="state.cellphonecode" class="form-control inputForm inputType <?php $__errorArgs = ['cellphonecode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="" id="cellphonecode" placeholder="Tipo">
                                                <option value="0">Selecciona una opción</option>
                                                <option value="0412">0412</option>
                                                <option value="0412">0414</option>
                                                <option value="0412">0424</option>
                                                <option value="0412">0416</option>
                                                <option value="0412">0426</option>
                                            </select>
                                            <?php $__errorArgs = ['cellphonecode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback">
                                                <?php echo e($message); ?>

                                            </div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                        <div class="col-xs-6 col-md-8 col=sm-8 col-8">
                                            <label for="cellphone">Nro Celular</label>
                                            <input type="text" wire:model.defer="state.cellphone" class="form-control inputForm inputType <?php $__errorArgs = ['cellphone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="cellphone" class="form-control inputForm" placeholder="Documento">
                                            <?php $__errorArgs = ['cellphone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback">
                                                <?php echo e($message); ?>

                                            </div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>                        
                                </div>
                                <div class="form-group">
                                    <div class="row mx-auto">
                                        <div class="col-xs-6 col-md-4 col-sm-4 col-4">
                                            <label for="identificationNac">Tipo </label>
                                            <select wire:model.defer="state.identificationNac" class="form-control inputForm inputType <?php $__errorArgs = ['identificationNac'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="" id="identificationNac" placeholder="Tipo">
                                                <option value="0">Selecciona una opción</option>
                                                <option value="V">V-</option>
                                                <option value="J">J-</option>
                                                <option value="E">E-</option>
                                                <option value="G">G-</option>
                                                <option value="P">P-</option>
                                            </select>
                                            <?php $__errorArgs = ['identificationNac'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback">
                                                <?php echo e($message); ?>

                                            </div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                        <div class="col-xs-6 col-md-8 col=sm-8 col-8">
                                            <label for="identificationNumber">Documento</label>
                                            <input type="text" wire:model.defer="state.identificationNumber" class="form-control inputForm inputType <?php $__errorArgs = ['identificationNumber'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="identificationNumber" class="form-control inputForm" placeholder="Documento">
                                            <?php $__errorArgs = ['identificationNumber'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback">
                                                <?php echo e($message); ?>

                                            </div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>                        
                                </div>
                            </div>
                        </div>
                        <div style="display: <?php echo e($visible7); ?>"> <!-- Datos pago online -->
                            <div class= "datosPagomovil">
                                <div class="form-group">
                                    <div class="row mx-auto">
                                        <div class="col-xs-6 col-md-4 col-sm-4 col-4">
                                            <label for="cellphonecode">Operadora </label>
                                            <select wire:model.defer="state.cellphonecode" class="form-control inputForm inputType <?php $__errorArgs = ['cellphonecode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="" id="cellphonecode" placeholder="Tipo">
                                                <option value="0">Selecciona una opción</option>
                                                <option value="0412">0412</option>
                                                <option value="0412">0414</option>
                                                <option value="0412">0424</option>
                                                <option value="0412">0416</option>
                                                <option value="0412">0426</option>
                                            </select>
                                            <?php $__errorArgs = ['cellphonecode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback">
                                                <?php echo e($message); ?>

                                            </div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                        <div class="col-xs-6 col-md-8 col=sm-8 col-8">
                                            <label for="cellphone">Nro Celular</label>
                                            <input type="text" wire:model.defer="state.cellphone" class="form-control inputForm inputType <?php $__errorArgs = ['cellphone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="cellphone" class="form-control inputForm" placeholder="Documento">
                                            <?php $__errorArgs = ['cellphone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback">
                                                <?php echo e($message); ?>

                                            </div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>                        
                                </div>
                                <div class="form-group">
                                    <div class="row mx-auto">
                                        <div class="col-xs-6 col-md-4 col-sm-4 col-4">
                                            <label for="identificationNac">Tipo </label>
                                            <select wire:model.defer="state.identificationNac" class="form-control inputForm inputType <?php $__errorArgs = ['identificationNac'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="" id="identificationNac" placeholder="Tipo">
                                                <option value="0">Selecciona una opción</option>
                                                <option value="V">V-</option>
                                                <option value="J">J-</option>
                                                <option value="E">E-</option>
                                                <option value="G">G-</option>
                                                <option value="P">P-</option>
                                            </select>
                                            <?php $__errorArgs = ['identificationNac'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback">
                                                <?php echo e($message); ?>

                                            </div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                        <div class="col-xs-6 col-md-8 col=sm-8 col-8">
                                            <label for="identificationNumber">Documento</label>
                                            <input type="text" wire:model.defer="state.identificationNumber" class="form-control inputForm inputType <?php $__errorArgs = ['identificationNumber'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="identificationNumber" class="form-control inputForm" placeholder="Documento">
                                            <?php $__errorArgs = ['identificationNumber'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback">
                                                <?php echo e($message); ?>

                                            </div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>                        
                                </div>

                                <div class="form-group">
                                    <div class="row mx-auto">
                                        <div class="col-xs-12 col-md-12 col=sm-12 col-12">
                                            <label for="identificationNumber">Plataforma de pago</label>
                                            <input type="pagoonline" wire:model.defer="state.pagoonline" class="form-control inputForm inputType <?php $__errorArgs = ['pagoonline'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="pagoonline" class="form-control inputForm" placeholder="Plataforma de pago">
                                            <?php $__errorArgs = ['pagoonline'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback">
                                                <?php echo e($message); ?>

                                            </div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>                        
                                </div>

                                <div class="form-group">
                                    <div class="row mx-auto">
                                        <div class="col-xs-12 col-md-12 col=sm-12 col-12">
                                            <label for="identificationNumber">Email</label>
                                            <input type="email" wire:model.defer="state.email" class="form-control inputForm inputType <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="email" class="form-control inputForm" placeholder="Email">
                                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback">
                                                <?php echo e($message); ?>

                                            </div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>                        
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times mr-1"></i> Cancelar</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-1"></i>
                            <?php if($showEditModal): ?>
                            <span>Guardar Cambios</span>
                            <?php else: ?>
                            <span>Guardar</span>
                            <?php endif; ?>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Eliminar Método</h5>
                </div>

                <div class="modal-body">
                    <h4>Esta seguro de querer eliminar este método?</h4>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times mr-1"></i> Cancelar</button>
                    <button type="button" wire:click.prevent="deleteMetodo" class="btn btn-danger"><i class="fa fa-trash mr-1"></i>Eliminar Método</button>
                </div>
            </div>
        </div>
    </div>    
    
</div>
<?php /**PATH C:\Users\Personal\Documents\Proyectos\github\pasarela\resources\views/livewire/afiliado/list-metodos-pagos-c.blade.php ENDPATH**/ ?>