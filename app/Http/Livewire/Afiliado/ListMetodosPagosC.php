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

    public $comercioId = 0;
    public $metodoId = 0;

    public function mount($comercioId = 0)
    {
        $this->comercioId = $comercioId;
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
        $comercioId = $this->comercioId;

		$this->reset();

        $this->metodoId = $metodoId;
        $this->comercioId = $comercioId;

		$this->showEditModal = false;

		$this->dispatchBrowserEvent('show-form');
	}

	public function createMetodo()
	{
		$validatedData = Validator::make($this->state, [
			'metodopago' => 'required',
		])->validate();

        $validatedData['comercioId'] = $this->comercioId;

		MetodoPagoC::create($validatedData);

		// session()->flash('message', 'User added successfully!');

		$this->dispatchBrowserEvent('hide-form', ['message' => 'Método de pago agregado satisfactoriamente!']);
	}

	public function edit(MetodoPagoC $metodo)
	{
		$comercioId = $this->comercioId;
        $metodoId = $this->metodoId;

		$this->reset();

        $this->comercioId = $comercioId;
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
        if($this->comercioId == 0 ){
            $metodos = MetodoPagoC::query();
        }else{
            $metodos = MetodoPagoC::query()
                ->where('comercioId', $this->comercioId);
        }
        
    	$metodos = $metodos
            ->where(function($q){
                $q->where('metodopago', 'like', '%'.$this->searchTerm.'%');                
            })
    		->orderBy($this->sortColumnName, $this->sortDirection)
            ->paginate(15);
        
        $comercio = Comercio::find($this->comercioId);
		
        return view('livewire.afiliado.list-metodos-pagos-c', [
            'comercio'  => $comercio,
        	'metodos' => $metodos,
        ]);
    }
}
