<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Jetstream\Rules\Role;
use Spatie\Permission\Models\Role as ModelsRole;


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
        $request->validate([
            'name' => 'required|unique:roles,name',
        ]);

        ModelsRole::create(['name' => $request->name]);

        session()->flash('swal', [
            'icon' => "success",
            'title' => 'Rol creado correctamente',
            'text' => 'El rol ha sido creado con exito'
        ]);

        return redirect()->route('admin.roles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        return view('admin.roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ModelsRole $role)
    {
        return view('admin.roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ModelsRole $role)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,' . $role->id,
        ]);

        $role->update(['name' => $request->name]);

        session()->flash('swal', [
            'icon' => "success",
            'title' => 'Rol actualizado correctamente',
            'text' => 'El rol ha sido actualizado con exito'
        ]);

        return redirect()->route('admin.roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ModelsRole $role)
    {
        $role->delete();

        session()->flash('swal', [
            'icon' => "success",
            'title' => 'Rol eliminado correctamente',
            'text' => 'El rol ha sido eliminado con exito'
        ]);

        return redirect()->route('admin.roles.index');
    }
}
