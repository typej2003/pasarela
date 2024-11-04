<?php

namespace App\Http\Livewire\Operacion;

use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\DatosBasicos;
use App\Models\Comercio;
use App\Models\Banco;
use App\Models\Transaccion;

class Pasarela extends Component
{
    public $id_suc; 

    public $tokenId;

    public $state = [];

    public $showEditModal = false;

    public $photo;

    public $comercio_id;

    public function mount($comercio_id = 1)
	{
		$this->comercio_id = $comercio_id;
		
	}

    public function addNew()
	{
        $tokenId = $this->tokenId;
		$this->reset();
        $this->tokenId = $tokenId;

        $this->state['identificationNac'] = "V";
		$this->showEditModal = false;

		$this->dispatchBrowserEvent('show-formUser');
	}

    public function createUser()
	{
        $messages = [
            'role.required'  => 'El rol es requerido.',
            'name.required'  => 'El nombre es requerido.',
            'email.required'  => 'El email es requerido.',
            // 'password.required'  => 'El Password es requerido.',
            // 'password.confirmed'  => 'El Password no esta confirmado.',
            'unique'    => 'Ya existe un email registrado',
        ];

		$validatedData = Validator::make($this->state, [
			'name' => 'required',
			'email' => 'required|email|unique:users',
			'password' => 'nullable',
			'role' => 'required',
            'email' => 'nullable',
            'identificationNac' => 'required',
            'identificationNumber' => 'required',
            'cellphonecode' => 'nullable',
            'cellphone' => 'nullable',
            'address' => 'nullable',
        ],
        $messages,)->validate();

        if(isset($validatedData['password'])){
            $validatedData['password'] = bcrypt($validatedData['password']);
        }else{
            $validatedData['password'] = bcrypt($validatedData['identificationNumber']);
        }

		if ($this->photo) {
			$validatedData['avatar'] = $this->photo->store('/', 'avatars');
		}

		$user = User::create($validatedData);

        DatosBasicos::create(['user_id' => $user->id, ]);

		// session()->flash('message', 'User added successfully!');

		$this->dispatchBrowserEvent('hide-formUser', [
            'identificationNumber' => $user->identificationNumber,
            'name' => $user->name,
        ]);
	}

    public function procesado(Request $request)
	{
		$this->tokenId = $request->get('ID');

        $this->id_suc = $request->get('ID'); 

        dd($request);
		
	}

    public function enviarDataPasarela(Request $request){

        
        $operacion = $request->get('datos');

        $comercio = Comercio::find($operacion['comercio_id']);

        $operacion['user_id'] = $comercio->user_id;

        $operacion['banco'] = '';
        if($operacion['codigo']){
            $banco = Banco::where('codigo', $operacion['codigo'])->first();
            $operacion['banco'] = $banco->name;
        }
        
        $transaccion = Transaccion::create($operacion);

        if($transaccion){
            $data = ['state'=> 'ok'];
        }
        else{
            $data = ['state'=> 'fallido'];
        }
        
        return response()->json($data);

    }

   
    public function createClient(Request $request){

        // dd($request);
        $validatedData = Validator::make($request->all(), [
            'identificationNac' => 'required|not_in:0',
            'identificationNumber' => 'required',
			'name' => 'required',
			'email' => 'required|email|unique:users',
			'password' => 'nullable',
            'password_confirmation' => 'nullable',
            'cellphonecode' => 'nullable',
            'cellphone' => 'nullable',
            'address' => 'nullable',
        ])->validate();

        if($validatedData['password'] !== null)
        {
            $validatedData['password'] = bcrypt($validatedData['password']);
        }else{
            $validatedData['password'] = bcrypt($validatedData['identificationNumber']);
        }
        
		
        $validatedData['role'] = 'cliente';

		$user = User::create($validatedData);

        $datosbasicos['user_id'] = $user->id;
        $datosbasicos['cellphonecode'] = $validatedData['cellphonecode'];
        $datosbasicos['cellphone'] = $validatedData['cellphone'];
        $datosbasicos['address'] = $validatedData['address'];

        DatosBasicos::create($datosbasicos);

		// session()->flash('message', 'User added successfully!');

		$this->dispatchBrowserEvent('hide-form-pasarela', [
            'message' => 'Usuario agregado satisfactoriamente!',
            'identificationNumber' => $user->identificationNumber,
            'name' => $user->name,
        ]);

        //return Redirect::back()->with('msg', 'The Message');
        
    }

    public function render()
    {
        return view('livewire.operacion.pasarela');
    }
}
