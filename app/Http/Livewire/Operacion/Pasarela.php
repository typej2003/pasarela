<?php

namespace App\Http\Livewire\Operacion;

use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\DatosBasicos;

class Pasarela extends Component
{
    public $id_suc; 

    public $tokenId;

    public $state = [];

    public $showEditModal = false;

    public $photo;

    public function mount(Request $request)
	{
		$this->tokenId = $request->get('ID');

        $this->id_suc = $request->get('ID'); 
		
	}

    public function addNew()
	{
        $tokenId = $this->tokenId;
		$this->reset();
        $this->tokenId = $tokenId;

		$this->showEditModal = false;

		$this->dispatchBrowserEvent('show-formUser');
	}

    public function createUser()
	{
        $messages = [
            'role.required'  => 'El rol es requerido.',
            'name.required'  => 'El nombre es requerido.',
            'email.required'  => 'El email es requerido.',
            'password.required'  => 'El Password es requerido.',
            'password.confirmed'  => 'El Password no esta confirmado.',
            'unique'    => 'Ya existe un email registrado',
        ];

		$validatedData = Validator::make($this->state, [
			'name' => 'required',
			'email' => 'required|email|unique:users',
			'password' => 'required|confirmed',
			'role' => 'required',
            
        ],
        $messages,)->validate();

		$validatedData['password'] = bcrypt($validatedData['password']);

		if ($this->photo) {
			$validatedData['avatar'] = $this->photo->store('/', 'avatars');
		}

		User::create($validatedData);

		// session()->flash('message', 'User added successfully!');

		$this->dispatchBrowserEvent('hide-form', ['message' => 'Usuario agregado satisfactoriamente!']);
	}


    public function procesado(Request $request)
	{
		$this->tokenId = $request->get('ID');

        $this->id_suc = $request->get('ID'); 

        dd($request);
		
	}

    public function autocompleteClientePasarela(Request $request)
    {
        if($request->get('campo')=='cedula'){
            $data = Paciente::select("cedula as value", "id as identi", "name as nombre", "cedula as cedula", "sexo as sexo", "fechanacimiento as fechanacimiento");    
        }
        else
        {
            $data = Paciente::select("name as value", "id as identi", "name as nombre", "cedula as cedula", "sexo as sexo", "fechanacimiento as fechanacimiento");
        }
        
        $data = $data
                ->where('laboratorio_id',  $request->get('laboratorio_id'))
                ->where(function($query)  use ($request){
                    $query->where('cedula', 'LIKE', '%'. $request->get('search'). '%')
                    ->orWhere('name', 'LIKE', '%'. $request->get('search'). '%');
                })
                ->get();
    
        return response()->json($data);
    }

    public function enviarData(Request $request){
        $data = ['valor' => "Operacion exitosa!", ];
        return response()->json($data);
    }

    //public function createClient(array $input)
    // public function createClient()
    // {
    //     return response()->json(['error'=>'error al crear']);

    //     $validatedData = Validator::make($request->all(), [
    //         'identificationNac' => 'required',
    //         'identificationNumber' => 'required',
	// 		'name' => 'required',
	// 		'email' => 'required|email|unique:users',
	// 		'password' => 'required|confirmed',
	// 		'role' => 'required',
	// 	])->validate();

	// 	$validatedData['password'] = bcrypt($validatedData['password']);
        
    //     $data = User::create($validatedData);

    //     if($data){
    //         $datosbasicos['user_id'] = $data->id;

    //         DatosBasicos::create($datosbasicos);
            
    //         return response()->json($data);

    //     }else{
    //         return response()->json(['error'=>'error al crear']);
    //     }
        
    // }

    public function createClient(Request $request){

        // dd($request);
        $validatedData = Validator::make($request->all(), [
            // 'identificationNac' => 'required',
            //'identificationNumber' => 'required',
			'name' => 'required',
			'email' => 'required|email|unique:users',
			//'password' => 'required|confirmed',
            //'password_confirmation' => 'required',
        ])->validate();
        
        dd($validatedData);
        
		$validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['role'] = 'cliente';

		$user = User::create($validatedData);

        DatosBasicos::create(['user_id' => $user->id]);

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
