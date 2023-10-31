<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\UserHistory;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware(['role:admin', 'permission:admin.users.index|admin.users.create|admin.users.edit|admin.users.destroy']);
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.users.index');
    }

    public function getUsersData(Request $request)
    {

        $query = User::query();

        // Realiza búsquedas o filtros si es necesario
        if ($request->has('search') && !empty($request->input('search')['value'])) {
            $searchValue = $request->input('search')['value'];
            $query->where(function ($subquery) use ($searchValue) {
                $subquery->where('id', 'like', '%' . $searchValue . '%')
                    ->orWhere('name', 'like', '%' . $searchValue . '%')
                    ->orWhere('email', 'like', '%' . $searchValue . '%');
            });
        }

        $totalRecords = $query->count(); // Obtén el número total de registros antes de la paginación

        // Realiza la paginación
        $usuarios = $query->offset($request->input('start'))
            ->limit($request->input('length'))
            ->get();

        return response()->json([
            'draw' => intval($request->input('draw')),
            'recordsTotal' => $totalRecords, // Total de registros sin filtrar
            'recordsFiltered' => $totalRecords, // Total de registros después del filtro (en este ejemplo, no hay filtro)
            'data' => $usuarios,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|regex:/^[A-Za-z]+(\s[A-Za-z]+)*$/',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            // Agrega otras reglas de validación según tus necesidades
        ], [
            'name.required' => 'El campo de nombres es obligatorio.',
            'name.regex' => 'El campo de nombres solo debe contener letras.',
            'email.required' => 'El campo de correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico debe ser válido.',
            'email.unique' => 'Este correo electrónico ya está en uso.',
            'password.required' => 'El campo de contraseña es obligatorio.',
            'password.min' => 'La contraseña debe tener al menos :min caracteres.',
        ]);

        // Crear el usuario si la validación es exitosa

        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        // Configura otros campos según tus necesidades
        $user->save();

        UserHistory::create([
            'user_id' => $user->id,
            'type_row' => 'create',
            'field_description' => 'Ha creado el usuario.',
            'field_name' => '',
            'old_value' => '',
            'new_value' => '',
            'created_by' => Auth::id(),
        ]);

        $response = [
            'redirect' => route('admin.users.edit', $user->id),
            'title' => 'Éxito',
            'message' => 'El usuario se ha registrado con éxito.',
            'type' => 'bg-success'
        ];

        return response()->json($response);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        if (!$user) {
            return abort(404);
        }
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        if (!$user) {
            return abort(404); // Manejo de usuario no encontrado
        }

        $roles = Role::all();

        $user->load('history'); // Cargar el historial de cambios

        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        if (!$user) {
            return abort(404);
        }

        $rules = [
            'name' => 'required|regex:/^[A-Za-z]+(\s[A-Za-z]+)*$/',
            'email' => 'required|email|unique:users,email,' . $id,
        ];

        if (!empty($request->input('password'))) {
            $rules['password'] = 'min:6';
        }

        $this->validate($request, $rules, [
            'name.required' => 'El campo de nombres es obligatorio.',
            'name.regex' => 'El campo de nombres solo debe contener letras.',
            'email.required' => 'El campo de correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico debe ser válido.',
            'email.unique' => 'Este correo electrónico ya está en uso.',
            'password.min' => 'La contraseña debe tener al menos :min caracteres.',
        ]);

        // Crear copias de los valores antiguos
        $oldName = $user->name;
        $oldEmail = $user->email;
        $oldRoles = $user->roles->pluck('id')->toArray();

        // Actualizar los valores en el objeto $user
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if (!empty($request->input('password'))) {
            $user->password = bcrypt($request->input('password'));
        }

        $user->save();

        //Asignar rol
        $newRoles = $request->input('roles');
        $user->roles()->sync($newRoles);

        // Identificar los roles añadidos y eliminados
        $addedRoles = array_diff($newRoles, $oldRoles);
        $deletedRoles = array_diff($oldRoles, $newRoles);


        foreach ($addedRoles as $role) {
            $roleModel = Role::find($role);
            UserHistory::create([
                'user_id' => $user->id,
                'type_row' => 'asign_role',
                'field_description' => 'Ha asignado',
                'field_name' => 'rol',
                'old_value' => null,
                'new_value' => $roleModel->name,
                'created_by' => Auth::id(),
            ]);
        }

        foreach ($deletedRoles as $role) {
            $roleModel = Role::find($role);
            UserHistory::create([
                'user_id' => $user->id,
                'type_row' => 'remove_role',
                'field_description' => 'desasigno',
                'field_name' => 'rol',
                'old_value' => $roleModel->name,
                'new_value' => null,
                'created_by' => Auth::id(),
            ]);
        }


        // Validación y actualización de campos, similar a lo que ya tienes

        $changes = [];

        if ($oldName !== $request->input('name')) {
            $changes[] = ['field_name' => 'nombre', 'field_description' => 'Registro editado', 'old_value' => $oldName, 'new_value' => $request->input('name')];
        }

        if ($oldEmail !== $request->input('email')) {
            $changes[] = ['field_name' => 'email', 'field_description' => 'Registro editado', 'old_value' => $oldEmail, 'new_value' => $request->input('email')];
        }

        if (!empty($request->input('password'))) {
            $changes[] = ['field_name' => 'contraseña', 'field_description' => 'Registro editado', 'old_value' => '********', 'new_value' => '********'];
        }

        if (empty($changes) && empty($addedRoles) && empty($deletedRoles)) {
            $response = [
                'redirect' => route('admin.users.edit', $user->id),
                'title' => 'Sin cambios',
                'message' => 'El registro no tiene ningún cambio actual.',
                'type' => 'bg-info'
            ];
            return response()->json($response);
        }

        //if (!empty($changes)) {
        // if (Auth::check()) {

        // }
        // Guarda el historial de cambios
        foreach ($changes as $change) {
            UserHistory::create([
                'user_id' => $user->id,
                'type_row' => 'update',
                'field_description' => $change['field_description'],
                'field_name' => $change['field_name'],
                'old_value' => $change['old_value'],
                'new_value' => $change['new_value'],
                'created_by' => Auth::id(),
            ]);
        }
        //}

        $response = [
            'redirect' => route('admin.users.edit', $user->id),
            'title' => 'Éxito',
            'message' => 'El usuario se ha editado con éxito.',
            'type' => 'bg-success'
        ];


        return response()->json($response);

        // return response()->json(['redirect' => route('admin.users.index')]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        if (!$user) {
            return abort(404);
        }

        $user->status_id = 2;
        $user->save();

        UserHistory::create([
            'user_id' => $user->id,
            'type_row' => 'delete',
            'field_description' => 'Ha eliminado el usuario.',
            'field_name' => '',
            'old_value' => '',
            'new_value' => '',
            'created_by' => Auth::id(),
        ]);

        return redirect()->route('admin.users.index');
    }
}
