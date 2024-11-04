<?php

namespace App\Http\Livewire\Afiliado;

use App\Http\Livewire\Admin\AdminComponent;
use App\Models\User;
use App\Models\Banco;
use App\Models\Comercio;
use App\Models\MetodoPago;
use App\Models\MetodoPagoC;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ListMetodosPagosC extends AdminComponent
{

	public $state = [];

	public $metodo;

	public $showEditModal = false;

	public $metodoIdBeingRemoved = null;

	public $searchTerm = null;

    protected $queryString = ['searchTerm' => ['except' => '']];

    public $sortColumnName = 'created_at';

    public $sortDirection = 'desc';

    public $comercio_id = 0;
    public $metodoId = "0";

	public $visible1 = 'none';
	public $visible2 = 'none';
	public $visible3 = 'none';
	public $visible4 = 'none';
	public $visible5 = 'none';
	public $visible6 = 'none';
	public $visible7 = 'none';

	protected $rules = [
        'metodoId' => 'required|not_in:0',
    ];

	protected $messages = [
		'metodoId.required' => 'Seleccione una método!',
		'cellphonecode.required' => 'Seleccione una método!',
		'cellphonecode.not_in:0' => 'El cóodigo no puede ser vacío!',
		'cellphone.not_in:0' => 'Debe ingresar un número de celular!',
		'identificationNac.required' => 'Seleccione un valor!',
		'identificationNumber.required' => 'Debe ingresar un número de documento!',
	];

    public function mount($comercio_id = 0)
    {
        $this->comercio_id = $comercio_id;
    }

	public function changeRole(Comercio $comercio, $status)
	{
		Validator::make(['status' => $status], [
			'status' => [
				'required',
				Rule::in(User::ROLE_ACTIVE, User::ROLE_NOACTIVE),
			],
		])->validate();

		$comercio->update(['status' => $status]);

		$this->dispatchBrowserEvent('updated', ['message' => "Estado cambió a {$role} satisfactoriamente."]);
	}

	public function changeDatos($status)
	{
		switch ($status) {
			case '0':
				$this->visible1 = 'none';
				$this->visible2 = 'none';
				$this->visible3 = 'none';
				$this->visible4 = 'none';
				$this->visible5 = 'none';
				$this->visible6 = 'none';
				$this->visible7 = 'none';
				break;
			case '1':
				$this->visible1 = 'block';
				$this->visible2 = 'none';
				$this->visible3 = 'none';
				$this->visible4 = 'none';
				$this->visible5 = 'none';
				$this->visible6 = 'none';
				$this->visible7 = 'none';
				break;
			case '2':
				$this->visible1 = 'none';
				$this->visible2 = 'block';
				$this->visible3 = 'none';
				$this->visible4 = 'none';
				$this->visible5 = 'none';
				$this->visible6 = 'none';
				$this->visible7 = 'none';
				break;
			case '3':
				$this->visible1 = 'none';
				$this->visible2 = 'none';
				$this->visible3 = 'block';
				$this->visible4 = 'none';
				$this->visible5 = 'none';
				$this->visible6 = 'none';
				$this->visible7 = 'none';
				break;
			case 'transferencia':
				$this->visible1 = 'none';
				$this->visible2 = 'none';
				$this->visible3 = 'none';
				$this->visible4 = 'block';
				$this->visible5 = 'none';
				$this->visible6 = 'none';
				$this->visible7 = 'none';
				break;
			case 'pagomovil':
				$this->visible1 = 'none';
				$this->visible2 = 'none';
				$this->visible3 = 'none';
				$this->visible4 = 'none';
				$this->visible5 = 'block';
				$this->visible6 = 'none';
				$this->visible7 = 'none';
				break;
			case '6':
				$this->visible1 = 'none';
				$this->visible2 = 'none';
				$this->visible3 = 'none';
				$this->visible4 = 'none';
				$this->visible5 = 'none';
				$this->visible6 = 'block';
				$this->visible7 = 'none';
				break;
			case 'pagoonline':
				$this->visible1 = 'none';
				$this->visible2 = 'none';
				$this->visible3 = 'none';
				$this->visible4 = 'none';
				$this->visible5 = 'none';
				$this->visible6 = 'none';
				$this->visible7 = 'block';
				break;
		}
		// $this->dispatchBrowserEvent('cambiarDatos', ['option' => $status, 'message' => "Estado"]);
	}

	public function addNew()
	{   
        $metodoId = $this->metodoId;
        $comercio_id = $this->comercio_id;

		$this->reset();

        $this->metodoId = $metodoId;
        $this->comercio_id = $comercio_id;

		$this->showEditModal = false;

		$this->dispatchBrowserEvent('show-form');
	}

	public function createMetodo()
	{
		$messages = [
			'metodoId.required' => 'Seleccione una método!',
			'cellphonecode.required' => 'Seleccione una método!',
			'cellphonecode.not_in:0' => 'El cóodigo no puede ser vacío!',
			'cellphone.not_in:0' => 'Debe ingresar un número de celular!',
			'identificationNac.required' => 'Seleccione un valor!',
			'identificationNumber.required' => 'Debe ingresar un número de documento!',
		];

		
		$this->validate();

		switch ($this->metodoId) {
			case '1':
				dd('falta vista');
				break;

			case '2':
				dd('falta vista');
				break;
			
			case '3':
				dd('falta vista');
				break;

			case 'transferencia':

				$validatedData = Validator::make($this->state, [
					'cellphonecode' => 'nullable',
					'cellphone' => 'nullable',
					'identificationNac' => 'required',
					'identificationNumber' => 'required',
					'banco' => 'required',
					'tipocuenta' => 'required',
					'nrocuenta' => 'required',
					'titular' => 'required',
				])->validate();
				break;
			
			case 'pagomovil':
				$validatedData = Validator::make($this->state, [
					'cellphonecode' => 'required|not_in:0',
					'cellphone' => 'required',
					'identificationNac' => 'required',
					'identificationNumber' => 'required',
				])->validate();
				break;

			case '6':
				dd('falta vista');
				break;
			
			case 'pagoonline':
				$validatedData = Validator::make($this->state, [
					'cellphonecode' => 'required|not_in:0',
					'cellphone' => 'required',
					'identificationNac' => 'required',
					'identificationNumber' => 'required',
					'email' => 'required',
					'pagoonline' => 'required',
				])->validate();
				break;

			case '8':
				dd('falta vista');
				break;
		}

        $validatedData['comercio_id'] = $this->comercio_id;
		$validatedData['metodo'] = $this->metodoId;

		MetodoPagoC::create($validatedData);

		// session()->flash('message', 'User added successfully!');

		$this->dispatchBrowserEvent('hide-form', ['message' => 'Método de pago agregado satisfactoriamente!']);
	}

	public function edit(MetodoPagoC $metodo)
	{
		$comercio_id = $this->comercio_id;
        $metodoId = $this->metodoId;

		$this->reset();

        $this->comercio_id = $comercio_id;
        $this->metodoId = $metodoId;

		$this->showEditModal = true;

		$this->metodo = $metodo;

		$this->state = $metodo->toArray();

		$this->dispatchBrowserEvent('show-form');
	}

	public function updateMetodo()
	{
		$validatedData = Validator::make($this->state, [
			'metodopago' => 'required',
		])->validate();

		$this->metodo->update($validatedData);

		$this->dispatchBrowserEvent('hide-form', ['message' => 'Método de Pago actualizado satisfactoriamente!']);
	}

	public function confirmMetodoRemoval($metodoId)
	{
		$this->metodoIdBeingRemoved = $metodoId;

		$this->dispatchBrowserEvent('show-delete-modal');
	}

	public function deleteMetodo()
	{
		$metodo = MetodoPagoC::findOrFail($this->metodoIdBeingRemoved);

		$metodo->delete();

		$this->dispatchBrowserEvent('hide-delete-modal', ['message' => 'Método de Pago eliminado satisfactoriamente!']);
	}

    public function sortBy($columnName)
    {
        if ($this->sortColumnName === $columnName) {
            $this->sortDirection = $this->swapSortDirection();
        } else {
            $this->sortDirection = 'asc';
        }

        $this->sortColumnName = $columnName;
    }

    public function swapSortDirection()
    {
        return $this->sortDirection === 'asc' ? 'desc' : 'asc';
    }

    public function updatedSearchTerm()
    {
        $this->resetPage();
    }

    public function render()
    {
        if($this->comercio_id == 0 ){
            $metodosC = MetodoPagoC::query();
        }else{
            $metodosC = MetodoPagoC::query()
                ->where('comercio_id', $this->comercio_id);
        }
        
    	$metodosC = $metodosC
            ->where(function($q){
                $q->where('metodo', 'like', '%'.$this->searchTerm.'%');                
            })
    		->orderBy($this->sortColumnName, $this->sortDirection)
            ->paginate(15);
        
        $comercio = Comercio::find($this->comercio_id);
		$metodos = MetodoPago::all();
		$bancos = Banco::all();
		
        return view('livewire.afiliado.list-metodos-pagos-c', [
            'comercio'  => $comercio,
        	'metodosC' => $metodosC,
			'metodos' => $metodos,
			'bancos' => $bancos,
        ]);
    }
}
