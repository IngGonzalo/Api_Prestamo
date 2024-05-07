<?php

namespace App\Http\Controllers\Rol;

use App\Http\Controllers\Controller;
use App\Http\Requests\Role\StoreRolRequest;
use App\Http\Resources\Rol\RolCollection;
use App\Http\Resources\Role\FullRolResource;
use App\Http\Resources\Role\RoleResource;
use App\Models\Rol;
use App\Models\Role;
use Illuminate\Http\Request;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();

        return new RolCollection($roles);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRolRequest $request)
    {
        //
        $roles = $request->validated();

        //guardar el request validado
        Role::create($roles);

        // retornar mensajes de guardado

        return response()->json([
            "message" => "El rol fue registrado",
            "roles" => $roles
        ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $term)
    {
        //
        $roles = Role::where('id', $term)
           ->orwhere('name',$term)
           ->get();

         // VALIDAR DE QUE EXISTA LA CATEGORIA
        if( count($roles) == 0 )
        {
            return response()->json([
                "message" => "No se encontro el rol",
            ], 404);
        }
        return new FullRolResource($roles[0]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $roles = Role::find($id);

        if( !$roles )
        {
            return response()->json([
                "message" => "No se encontro la categoria",
            ], 404);
        }

       

        $roles->update( $request->all() );

        return response()->json([
            "message" => "El rol fue actualizada",
            "category" => new RoleResource($roles),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $roles = Role::find($id);

        if( !$roles )
        {
            return response()->json([
                "message" => "No se encontro el rol",
            ], 404);
        }

        $roles->delete();

        
        return response()->json([
            "message" => "el rol fue eliminada",
            "rol" => $roles
        ], 200);
    }
}
