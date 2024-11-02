<?php

namespace App\Http\Livewire\Afiliado;

use App\Http\Livewire\Admin\AdminComponent;
use App\Models\User;
use App\Models\Comercio;
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
    public $metodoId = 0;

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
		$validatedData = Validator::make($this->state, [
			'metodopago' => 'required',
		])->validate();

        $validatedData['comercio_id'] = $this->comercio_id;

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
            $metodos = MetodoPagoC::query();
        }else{
            $metodos = MetodoPagoC::query()
                ->where('comercio_id', $this->comercio_id);
        }
        
    	$metodos = $metodos
            ->where(function($q){
                $q->where('metodopago', 'like', '%'.$this->searchTerm.'%');                
            })
    		->orderBy($this->sortColumnName, $this->sortDirection)
            ->paginate(15);
        
        $comercio = Comercio::find($this->comercio_id);
		
        return view('livewire.afiliado.list-metodos-pagos-c', [
            'comercio'  => $comercio,
        	'metodos' => $metodos,
        ]);
    }
}
