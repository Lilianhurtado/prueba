<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.roles.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.roles.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //valida que se cree bien
        $request->validate([
            'name' => 'required|unique:roles,name'
        ]);

        //si pasa la validacion se crea el rol
        Role::create(['name' => $request->name]);

        //variable de un solo uso de alerta
        session()->flash('swal', 
            [
                'icon' => 'success',
                'title' => 'Rol creado exitosamente',
                'text' => 'El rol se ha creado correctamente.'
            ]
        );
        //redireccionar a la vista de roles
        return redirect()->route('admin.roles.index')->with('success', 'Rol created succesfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        // Restricción: no permitir editar los primeros 4 roles base
        if ($role->id <= 4) {
            session()->flash('swal', [
                'icon' => 'error',
                'title' => 'Acción no permitida',
                'text' => 'No se pueden editar los roles base del sistema.'
            ]);
            return redirect()->route('admin.roles.index');
        }

        return view('admin.roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        // Restricción: no permitir actualizar los primeros 4 roles base
        if ($role->id <= 4) {
            session()->flash('swal', [
                'icon' => 'error',
                'title' => 'Acción no permitida',
                'text' => 'No se pueden modificar los roles base del sistema.'
            ]);
            return redirect()->route('admin.roles.index');
        }

        // Validar con regla unique excluyendo el registro actual
        $request->validate([
            'name' => 'required|unique:roles,name,' . $role->id
        ]);

        // Detectar si no hubo cambios
        if ($role->name === $request->name) {
            session()->flash('swal', [
                'icon' => 'info',
                'title' => 'Sin cambios',
                'text' => 'No se realizaron cambios en el rol.'
            ]);
            return redirect()->route('admin.roles.index');
        }

        // Actualizar el rol
        $role->update(['name' => $request->name]);

        // Mensaje de éxito
        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Rol actualizado',
            'text' => 'El rol se ha actualizado correctamente.'
        ]);

        return redirect()->route('admin.roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        // Restricción: no permitir eliminar los primeros 4 roles base
        if ($role->id <= 4) {
            session()->flash('swal', [
                'icon' => 'error',
                'title' => 'Acción no permitida',
                'text' => 'No se pueden eliminar los roles base del sistema.'
            ]);
            return redirect()->route('admin.roles.index');
        }

        // Eliminar el rol
        $role->delete();

        // Mensaje de éxito
        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Rol eliminado',
            'text' => 'El rol se ha eliminado correctamente.'
        ]);

        return redirect()->route('admin.roles.index');
    }
}
