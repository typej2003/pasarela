<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><i class="fa fa-solid fa-file-invoice-dollar"></i> Transacciones</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Tablero</a></li>
                        <li class="breadcrumb-item active">Transacciones</li>
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
                                <span>Dueño: </span>
                            </div>
                            <div class="col-lg-6">
                                <span><?php echo e($comercio->propietario()); ?></span>
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
                        <div class="row">
                            <div class="col-lg-6">
                                <span>Operación No Confirmada: </span>
                            </div>
                            <div class="col-lg-6">
                                <span><?php echo e($comercio->OperacionNoConfirmada()); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="d-flex justify-content-between mb-2">
                        <button wire:click.prevent="addNew" class="btn btn-primary"><i class="fa fa-plus-circle mr-1"></i> Nueva Transacción</button>
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.search-input','data' => ['wire:model.live' => 'searchTerm']]); ?>
<?php $component->withName('search-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['wire:model.live' => 'searchTerm']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-hover table-bordered table-responsive">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Propietario</th>
                                        <th scope="col">Cliente</th>
                                        <th scope="col" wire:ignore>
                                            <select wire:model.refer="status" class="form-control border-0" style="width:150px;font-weight: bold;" name="" id="">
                                                <option value="all" select>Estados</option>
                                                <option value="confirmado">Confirmados</option> 
                                                <option value="norevisado">No Revisados</option> 
                                            </select>
                                        </th>
                                        <th scope="col">Código de Factura</th>
                                        <th scope="col" wire:ignore>
                                            <select wire:model.refer="metodoPago" class="form-control border-0" style="width:150px;font-weight: bold;" name="" id="">
                                                <option value="all">Método de Pago</option>
                                                <?php $__currentLoopData = $modoPago; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $metodo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php echo e($valor = $metodo['modo']); ?>

                                                    <option value="<?php echo e($metodo['modo']); ?>" <?php echo e(($metodoPago === $valor) ? 'selected' : ''); ?>> <?php echo e($metodo['nombre']); ?></option> 
                                                    
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </th>
                                        <th scope="col">Referencia</th>
                                        <th scope="col">
                                            Cédula
                                            <span wire:click="sortBy('identificationNumber')" class="float-right text-sm" style="cursor: pointer;">
                                                <i class="fa fa-arrow-up <?php echo e($sortColumnName === 'identificationNumber' && $sortDirection === 'asc' ? '' : 'text-muted'); ?>"></i>
                                                <i class="fa fa-arrow-down <?php echo e($sortColumnName === 'identificationNumber' && $sortDirection === 'desc' ? '' : 'text-muted'); ?>"></i>
                                            </span>
                                        </th>
                                        <th scope="col">Teléfono</th>
                                        <th scope="col">Banco</th>
                                        <th scope="col">Código</th>
                                        <th scope="col">Fecha de Pago</th>
                                        <th scope="col">Fecha de Registro</th>
                                        <th scope="col">Monto</th>
                                        <th scope="col">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody wire:loading.class="text-muted">
                                    <?php $__empty_1 = true; $__currentLoopData = $transacciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $trans): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <th scope="row"><?php echo e($transacciones->firstItem() + $index); ?></th>
                                        <td><?php echo e($trans->userId); ?></td>
                                        <td><?php echo e($trans->clienteId); ?></td>
                                        <td>
                                            <select style="width: 150px;" class="form-control" wire:change="changeStatus(<?php echo e($trans); ?>, $event.target.value)">
                                                <option value="confirmed" <?php echo e(($trans->status === 'confirmed') ? 'selected' : ''); ?>>CONFIRMADO</option>
                                                <option value="notconfirmed" <?php echo e(($trans->status === 'notconfirmed') ? 'selected' : ''); ?>>NO CONFIRMADO</option>
                                            </select>
                                        </td>
                                        <td>
                                            <span class="mr-2"><?php echo e($trans->codigoFactura); ?></span>
                                        </td>
                                        <td>
                                            <span class="mr-2"><?php echo e($trans->metodo); ?></span>
                                        </td>
                                        <td><?php echo e($trans->reference); ?></td>
                                        <td><?php echo e($trans->identificationNumber); ?></td>
                                        <td><?php echo e($trans->cellphone); ?></td>
                                        <td><?php echo e($trans->banco); ?></td>
                                        <td><?php echo e($trans->codigo); ?></td>
                                        <td><?php echo e($trans->fechaPago); ?></td>
                                        <td><?php echo e($trans->created_at?->toFormattedDate() ?? 'N/A'); ?></td>
                                        <td><?php echo e($trans->amount); ?></td>
                                        <td>
                                            <a href="" wire:click.prevent="edit(<?php echo e($trans); ?>)">
                                                <i class="fa fa-edit mr-2"></i>
                                            </a>

                                            <a href="" wire:click.prevent="confirmTransRemoval(<?php echo e($trans->id); ?>)">
                                                <i class="fa fa-trash text-danger"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr class="text-center">
                                        <td colspan="13">
                                            <img src="https://42f2671d685f51e10fc6-b9fcecea3e50b3b59bdc28dead054ebc.ssl.cf5.rackcdn.com/v2/assets/empty.svg" alt="No results found">
                                            <p class="mt-2">Resultados no encontrados</p>
                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            <?php echo e($transacciones->links()); ?>

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
            <form autocomplete="off" wire:submit.prevent="<?php echo e($showEditModal ? 'updateTrans' : 'createTrans'); ?>">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            <?php if($showEditModal): ?>
                            <span>Editar Transaccion</span>
                            <?php else: ?>
                            <span>Nuevo Transaccion</span>
                            <?php endif; ?>
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="userId">Usuario </label>
                            <input type="text" wire:model="state.userId" class="form-control <?php $__errorArgs = ['userId'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="userId" name="userId" aria-describedby="nameHelp" placeholder="Introduzca la userId">
                            <?php $__errorArgs = ['userId'];
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
                            <label for="clienteId">Cliente </label>
                            <input type="text" wire:model="state.clienteId" class="form-control <?php $__errorArgs = ['clienteId'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="userId" name="clienteId" aria-describedby="nameHelp" placeholder="Introduzca la clienteId">
                            <?php $__errorArgs = ['clienteId'];
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
                        
                        <div class="form-group" wire:ignore>
                            <label for="status">Estado</label>
                            <select name="status" wire:model.defer="state.status" class="form-control <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="status">
                                <option value="confirmado">CONFIRMADO</option>
                                <option value="norevisado" selected>NO REVISADO</option>
                            </select>
                            <?php $__errorArgs = ['status'];
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
                            <label for="codigoFactura">Codigo Factura</label>
                            <input type="text" wire:model.defer="state.codigoFactura" class="form-control <?php $__errorArgs = ['codigoFactura'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="codigoFactura" aria-describedby="nameHelp" placeholder="Introduzca el codigo de la factura">
                            <?php $__errorArgs = ['codigoFactura'];
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
                            <label for="metodo">Modo de Pago</label>
                            <select name="metodo" wire:model.defer="state.metodo" class="form-control <?php $__errorArgs = ['metodo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="metodo">
                                <option value="0" selected>SELECCIONE..</option>
                                <option value="pagomovil" selected>PAGO MOVIL</option>
                                <option value="transferencia" selected>TRANSFERENCIA</option>
                                <option value="zelle" selected>ZELLE</option>
                            </select>
                            <?php $__errorArgs = ['modopago'];
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
                            <label for="reference">Referencia</label>
                            <input type="text" wire:model.defer="state.reference" class="form-control <?php $__errorArgs = ['reference'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="reference" aria-describedby="nameHelp" placeholder="Introduzca la Referencia">
                            <?php $__errorArgs = ['reference'];
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
                            <label for="identificationNumber">Cédula</label>
                            <input type="text" wire:model.defer="state.identificationNumber" class="form-control <?php $__errorArgs = ['identificationNumber'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="identificationNumber" aria-describedby="nameHelp" placeholder="Introduzca la cedula">
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

                        <div class="form-group">
                            <label for="cellphone">Teléfono</label>
                            <input type="text" wire:model.defer="state.cellphone" class="form-control <?php $__errorArgs = ['cellphone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="cellphone" aria-describedby="nameHelp" placeholder="Introduzca el Teléfono">
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

                        <div class="form-group" wire:ignore>
                            <label for="codigo">Banco</label>
                            <select name="codigo" id="codigo" wire:model.defer="state.codigo" class="form-control <?php $__errorArgs = ['codigo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">

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
                            <label for="fechaPago">Fecha de Pago</label>
                            <input type="date" wire:model.defer="state.fechaPago" class="form-control <?php $__errorArgs = ['fechaPago'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="fechaPago" name="fechaPago" aria-describedby="fechaPagoHelp" placeholder="Introduzca la Fecha de Pago">
                            <?php $__errorArgs = ['fechaPago'];
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
                            <label for="monto">Monto</label>
                            <input type="text" wire:model.defer="state.amount" class="form-control <?php $__errorArgs = ['amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="amount" aria-describedby="nameHelp" placeholder="Introduzca el Monto">
                            <?php $__errorArgs = ['amount'];
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
                    <h5>Eliminar Transacción</h5>
                </div>

                <div class="modal-body">
                    <h4>Estas seguro de querer eliminar esta transacción?</h4>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times mr-1"></i> Cancelar</button>
                    <button type="button" wire:click.prevent="deleteTrans" class="btn btn-danger"><i class="fa fa-trash mr-1"></i>Eliminar Transacción</button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->startPush('js'); ?>
<script>
    cargarBanco()

    function funcionBancos(){
        let bancos
        return bancos =
        {
            "bancos": [
            {
                "name": "BANCO DE VENEZUELA",
                "codigo": "0102"
            },
            {
                "name": "100% BANCO",
                "codigo": "0156"
            },
            {
                "name": "BANCAMIGA BANCO MICROFINANCIERO CA",
                "codigo": "0172"
            },
            {
                "name": "BANCARIBE",
                "codigo": "0114"
            },
            {
                "name": "BANCO ACTIVO",
                "codigo": "0171"
            },
            {
                "name": "BANCO AGRICOLA DE VENEZUELA",
                "codigo": "0166"
            },
            {
                "name": "BANCO BICENTENARIO DEL PUEBLO",
                "codigo": "0175"
            },
            {
                "name": "BANCO CARONI",
                "codigo": "0128"
            },
            {
                "name": "BANCO DEL TESORO",
                "codigo": "0163"
            },
            {
                "name": "BANCO EXTERIOR",
                "codigo": "0115"
            },
            {
                "name": "BANCO FONDO COMUN",
                "codigo": "0151"
            },
            {
                "name": "BANCO INTERNACIONAL DE DESARROLLO",
                "codigo": "0173"
            },
            {
                "name": "BANCO MERCANTIL",
                "codigo": "0105"
            },
            {
                "name": "BANCO NACIONAL DE CREDITO",
                "codigo": "0191"
            },
            {
                "name": "BANCO PLAZA",
                "codigo": "0138"
            },
            {
                "name": "BANCO SOFITASA",
                "codigo": "0137"
            },
            {
                "name": "BANCO VENEZOLANO DE CREDITO",
                "codigo": "0104"
            },
            {
                "name": "BANCRECER",
                "codigo": "0168"
            },
            {
                "name": "BANESCO",
                "codigo": "0134"
            },
            {
                "name": "BANFANB",
                "codigo": "0177"
            },
            {
                "name": "BANGENTE",
                "codigo": "0146"
            },
            {
                "name": "BANPLUS",
                "codigo": "0174"
            },
            {
                "name": "BBVA PROVINCIAL",
                "codigo": "0108"
            },
            {
                "name": "DELSUR BANCO UNIVERSAL",
                "codigo": "0157"
            },
            {
                "name": "MI BANCO",
                "codigo": "0169"
            },
            {
                "name": "N58 BANCO DIGITAL BANCO MICROFINANCIERO S A",
                "codigo": "0178"
            }
            ]
        }
        
    }

    function cargarBanco(){
        
        var bancos = funcionBancos()


        let bancosS = document.querySelector("#codigo");
        
        bancosS.innerHTML += "<option value='0'>SELECCIONE..</option>"; 

        bancos.bancos.forEach( e => {
            bancosS.innerHTML += "<option value='"+e['codigo']+"'>"+e['name']+"</option>"; 
        })

    }
</script>
<?php $__env->stopPush(); ?><?php /**PATH C:\Users\Personal\Documents\Proyectos\github\pasarela\resources\views/livewire/transaccion/list-transacciones.blade.php ENDPATH**/ ?>