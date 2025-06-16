<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Secteurs;

class SecteursController extends Controller
{
    /**
         * @OA\Get(
         *     path="/api/Secteurs",
         *     tags={"Secteurs"},
         *     summary="Lister tous les Secteurs",
         *     @OA\Response(
         *         response=200,
         *         description="Liste des Secteurs",
         *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Niveau"))
         *     )
         * )
    */

    public function index(){
        return Secteurs::all();
    }


/**
     * @OA\Get(
     *     path="/api/secteurs/{id}",
     *     tags={"Secteurs"},
     *     summary="recuperation d'un Secteur ",
     *     @OA\Response(
     *         response=200,
     *         description="Recuperation d'un Secteurs precise en fonction de son identifiant",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Secteur"))
     *     )
     * )
*/

function findEtudiant(Request $request){
    $id= $request->id;
    $secteur = Secteurs::findOrFail($id);

    return [$secteur];
}




/**
     * @OA\Post(
     *     path="/api/secteur",
     *     tags={"Secteurs"},
     *     summary="Insertion d'un nouveau Secteur ",
     *     @OA\Response(
     *         response=200,
     *         description="Insertion d'une nouveau secteur dans la table Secteurs",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Secteur"))
     *     )
     * )
*/


public function store(Request $request){
    $request->validate([
        'id' => 'required',
        'name' => 'required',
        'label' =>'required',
      ]);

      Secteurs::create($request->all());
    return redirect()->route('posts.index')
    ->with('success', 'Secteurs created successfully.');
}


  /**
     * @OA\Delete(
     *     path="/api/secteur/{id}",
     *     tags={"Secteurs"},
     *     summary="Suppression d'un Secteur ",
     *     @OA\Response(
     *         response=200,
     *         description="Suppression d'un secteur dans la table Secteurs",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Secteur"))
     *     )
     * )
*/

    public function destroy($id){

        $secteur = Secteurs::find($id);
        $secteur->delete();
        return redirect()->route('posts.index')
        ->with('success', 'Secteurs deleted successfully');
    }

/**
     * @OA\Put(
     *     path="/api/secteur/{id}",
     *     tags={"Secteurs"},
     *     summary="Mise a jour d'un Secteur ",
     *     @OA\Response(
     *         response=200,
     *         description="Mise a jour d'un Secteur dans la table Secteurs",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Secteur"))
     *     )
     * )
*/



public function update(Request $request, $id){
    $request->validate([
        'id' => 'required',
        'name' => 'required',
        'label' =>'required',

      ]);

        $secteur = Secteurs::find($id);
        $secteur->update($request->all());

        return redirect()->route('posts.index')
        ->with('success', 'Secteurs updated successfully.');
    }
}
