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

	public $comercio_idBeingRemoved = null;

	public $searchTerm = null;

    protected $queryString = ['searchTerm' => ['except' => '']];

    public $sortColumnName = 'created_at';

    public $sortDirection = 'desc';

    public $user_id = 0;

    public function mount($user_id = 0)
    {
        $this->user_id = $user_id;
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
        $user_id = $this->user_id;

		$this->reset();

        $this->user_id = $user_id;

		$this->showEditModal = false;

		$this->dispatchBrowserEvent('show-form');
	}

	public function createComercio()
	{
		$validatedData = Validator::make($this->state, [
			'name' => 'required',
		])->validate();

        $validatedData['user_id'] = $this->user_id;

		Comercio::create($validatedData);

		// session()->flash('message', 'User added successfully!');

		$this->dispatchBrowserEvent('hide-form', ['message' => 'Comercio agregado satisfactoriamente!']);
	}

	public function edit(Comercio $comercio)
	{
		$user_id = $this->user_id;

		$this->reset();

        $this->user_id = $user_id;

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

	public function confirmComercioRemoval($comercio_id)
	{
		$this->comercio_idBeingRemoved = $comercio_id;

		$this->dispatchBrowserEvent('show-delete-modal');
	}

	public function deleteComercio()
	{
		$user = User::findOrFail($this->user_idBeingRemoved);

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
        if($this->user_id == 0 ){
            $comercios = Comercio::query();
        }else{
            $comercios = Comercio::query()
                ->where('user_id', $this->user_id);
        }
        
    	$comercios = $comercios
            ->where(function($q){
                $q->where('name', 'like', '%'.$this->searchTerm.'%');                
            })
    		->orderBy($this->sortColumnName, $this->sortDirection)
            ->paginate(5);
        
        $user = User::find($this->user_id);
		
        return view('livewire.afiliado.list-comercios', [
            'user'  => $user,
        	'comercios' => $comercios,
        ]);
    }
}
