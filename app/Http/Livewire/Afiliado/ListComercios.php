<?php

namespace App\Http\Livewire\Afiliado;

use App\Http\Livewire\Admin\AdminComponent;
use App\Models\User;
use App\Models\Comercio;
use App\Models\Area;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;

class ListComercios extends AdminComponent
{
	use WithFileUploads;

	public $state = [];

	public $comercio;

	public $showEditModal = false;

	public $comercioIdBeingRemoved = null;

	public $searchTerm = null;

    protected $queryString = ['searchTerm' => ['except' => '']];

    public $sortColumnName = 'created_at';

    public $sortDirection = 'desc';

    public $userId = 0;

	public $photo;

	protected $listeners = [
		'generarKeyword'
   		];

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

	public function generarKeyword($name)
	{
		$this->state['keyword'] = strtolower(str_replace(' ', '', $this->state['name']));

		$this->dispatchBrowserEvent('getKeyword', ['keyword' => $this->state['keyword']]);
		

	}

	public function createComercio()
	{
		$validatedData = Validator::make($this->state, [
			'area_id'=> 'required|not_in:0',
			'name' => 'required',
		])->validate();

		if ($this->photo) {
			$validatedData['avatar'] = $this->photo->store('/', 'avatarscomercios');
		}

        $validatedData['user_id'] = $this->userId;

		$validatedData['keyword'] = $this->state['keyword'];

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
			'area_id' => 'required',
		])->validate();

		$validatedData['keyword'] = $this->state['keyword'];

		if ($this->photo) {
			$validatedData['avatar'] = $this->photo->store('/', 'avatarscomercios');
		}

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
		$comercio = Comercio::findOrFail($this->comercioIdBeingRemoved);

		$comercio->delete();

		$this->dispatchBrowserEvent('hide-delete-modal', ['message' => 'Comercio eliminado satisfactoriamente!']);
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
                ->where('user_id', $this->userId);
        }
        
    	$comercios = $comercios
            ->where(function($q){
                $q->where('name', 'like', '%'.$this->searchTerm.'%');                
            })
    		->orderBy($this->sortColumnName, $this->sortDirection)
            ->paginate(15);
        
        $user = User::find($this->userId);

		$areas = Area::all();
		
        return view('livewire.afiliado.list-comercios', [
            'user'  => $user,
			'areas'  => $areas,
        	'comercios' => $comercios,
        ]);
    }
}
