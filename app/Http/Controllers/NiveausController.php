<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Niveaus;

class NiveausController extends Controller
{
 /**
         * @OA\Get(
         *     path="/api/Niveaus",
         *     tags={"Niveaus"},
         *     summary="Lister tous les Niveaux",
         *     @OA\Response(
         *         response=200,
         *         description="Liste des Niveaus",
         *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Niveau"))
         *     )
         * )
    */

    public function index(){
        return Niveaus::all();
    }


/**
     * @OA\Get(
     *     path="/api/niveau/{id}",
     *     tags={"Niveaus"},
     *     summary="recuperation d'un niveau ",
     *     @OA\Response(
     *         response=200,
     *         description="Recuperation d'un niveau precise en fonction de son identifiant",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Niveau"))
     *     )
     * )
*/

function findEtudiant(Request $request){
    $id= $request->id;
    $niveaux = Niveaus::findOrFail($id);

    return [$niveaux];
}




/**
     * @OA\Post(
     *     path="/api/niveau",
     *     tags={"Niveaus"},
     *     summary="Insertion d'un nouveau Niveau ",
     *     @OA\Response(
     *         response=200,
     *         description="Insertion d'une nouveau niveau dans la table niveauses",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Niveau"))
     *     )
     * )
*/


public function store(Request $request){
    $request->validate([
        'id' => 'required',
        'name' => 'required',
        'label' =>'required',
      ]);

    Niveaus::create($request->all());
    return redirect()->route('posts.index')
    ->with('success', 'Niveaux created successfully.');
}


  /**
     * @OA\Delete(
     *     path="/api/niveaus/{id}",
     *     tags={"Niveaus"},
     *     summary="Suppression d'un niveau ",
     *     @OA\Response(
     *         response=200,
     *         description="Suppression d'un niveau dans la table Niveauses",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Niveau"))
     *     )
     * )
*/

    public function destroy($id){

        $Niveau = Niveaus::find($id);
        $Niveau->delete();
        return redirect()->route('posts.index')
        ->with('success', 'Niveaux deleted successfully');
    }

/**
     * @OA\Put(
     *     path="/api/niveau/{id}",
     *     tags={"Niveaus"},
     *     summary="Mise a jour d'un niveau ",
     *     @OA\Response(
     *         response=200,
     *         description="Mise a jour d'un niveau dans la table niveau",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Niveau"))
     *     )
     * )
*/



public function update(Request $request, $id){
    $request->validate([
        'id' => 'required',
        'name' => 'required',
        'label' =>'required',

      ]);

        $Niveau = Niveaus::find($id);
        $Niveau->update($request->all());

        return redirect()->route('posts.index')
        ->with('success', 'Niveaux updated successfully.');
    }
}
