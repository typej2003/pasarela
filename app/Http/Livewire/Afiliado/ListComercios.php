<?php

namespace App\Http\Livewire\Afiliado;

use App\Http\Livewire\Admin\AdminComponent;
use App\Models\User;
use App\Models\Comercio;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ListComercios extends AdminComponent
{

	public $state = [];

	public $comercio;

	public $showEditModal = false;

	public $comercioIdBeingRemoved = null;

	public $searchTerm = null;

    protected $queryString = ['searchTerm' => ['except' => '']];

    public $sortColumnName = 'created_at';

    public $sortDirection = 'desc';

    public $userId = 0;

    public function mount($userId = 0)
    {
        $this->userId = $userId;
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
        $userId = $this->userId;

		$this->reset();

        $this->userId = $userId;

		$this->showEditModal = false;

		$this->dispatchBrowserEvent('show-form');
	}

	public function createComercio()
	{
		$validatedData = Validator::make($this->state, [
			'name' => 'required',
		])->validate();

        $validatedData['userId'] = $this->userId;

		Comercio::create($validatedData);

		// session()->flash('message', 'User added successfully!');

		$this->dispatchBrowserEvent('hide-form', ['message' => 'Comercio agregado satisfactoriamente!']);
	}

	public function edit(Comercio $comercio)
	{
		$userId = $this->userId;

		$this->reset();

        $this->userId = $userId;

		$this->showEditModal = true;

		$this->comercio = $comercio;

		$this->state = $comercio->toArray();

		$this->dispatchBrowserEvent('show-form');
	}

	public function updateComercio()
	{
		$validatedData = Validator::make($this->state, [
			'name' => 'required',
		])->validate();

		$this->comercio->update($validatedData);

		$this->dispatchBrowserEvent('hide-form', ['message' => 'Comercio actualizado satisfactoriamente!']);
	}

	public function confirmComercioRemoval($comercioId)
	{
		$this->comercioIdBeingRemoved = $comercioId;

		$this->dispatchBrowserEvent('show-delete-modal');
	}

	public function deleteComercio()
	{
		$user = User::findOrFail($this->userIdBeingRemoved);

		$user->delete();

		$this->dispatchBrowserEvent('hide-delete-modal', ['message' => 'Usuario eliminado satisfactoriamente!']);
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
        if($this->userId == 0 ){
            $comercios = Comercio::query();
        }else{
            $comercios = Comercio::query()
                ->where('userId', $this->userId);
        }
        
    	$comercios = $comercios
            ->where(function($q){
                $q->where('name', 'like', '%'.$this->searchTerm.'%');                
            })
    		->orderBy($this->sortColumnName, $this->sortDirection)
            ->paginate(5);
        
        $user = User::find($this->userId);
		
        return view('livewire.afiliado.list-comercios', [
            'user'  => $user,
        	'comercios' => $comercios,
        ]);
    }
}
