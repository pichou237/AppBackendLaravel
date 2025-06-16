<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entreprises;

class EntreprisesController extends Controller
{
    /**
         * @OA\Get(
         *     path="/api/entreprises",
         *     tags={"Entreprises"},
         *     summary="Lister tous les entreprises",
         *     @OA\Response(
         *         response=200,
         *         description="Liste des entreprises",
         *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Entreprise"))
         *     )
         * )
    */

    public function index(){
        return Entreprises::all();
    }


/**
     * @OA\Get(
     *     path="/api/entreprise/{id}",
     *     tags={"Entreprises"},
     *     summary="recuperation d'une etreprise ",
     *     @OA\Response(
     *         response=200,
     *         description="Recuperation d'une entreprise precis en fonction de son matricule",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Entreprise"))
     *     )
     * )
*/

function findEtudiant(Request $request){
    $id= $request->id;
    $entreprise = Entreprises::findOrFail($id);

    return [$entreprise];

}

/**
     * @OA\Post(
     *     path="/api/Entreprise",
     *     tags={"Entreprises"},
     *     summary="Insertion d'un nouveau Secteur ",
     *     @OA\Response(
     *         response=200,
     *         description="Insertion d'une nouvelle Entreprise dans la table Entreprises",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Entreprise"))
     *     )
     * )
*/


public function store(Request $request){
    $request->validate([
        'id' => 'required',
        'name' => 'required',
        'label' =>'required',
      ]);

      Entreprises::create($request->all());
    return redirect()->route('posts.index')
    ->with('success', 'Entreprise created successfully.');
}


  /**
     * @OA\Delete(
     *     path="/api/Entreprise/{id}",
     *     tags={"Secteurs"},
     *     summary="Suppression d'une Entreprise ",
     *     @OA\Response(
     *         response=200,
     *         description="Suppression d'une Entreprise dans la table Entreprises",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Entreprise"))
     *     )
     * )
*/

    public function destroy($id){

        $Entreprise = Entreprises::find($id);
        $Entreprise->delete();
        return redirect()->route('posts.index')
        ->with('success', 'Entreprises deleted successfully');
    }

/**
     * @OA\Put(
     *     path="/api/Entreprise/{id}",
     *     tags={"Entreprises"},
     *     summary="Mise a jour d'une Entreprise ",
     *     @OA\Response(
     *         response=200,
     *         description="Mise a jour d'une Entreprise dans la table Entreprises",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Entreprise"))
     *     )
     * )
*/



public function update(Request $request, $id){
    $request->validate([
        'id' => 'required',
        'name' => 'required',
        'label' =>'required',

      ]);

        $Entreprise = Entreprises::find($id);
        $Entreprise->update($request->all());

        return redirect()->route('posts.index')
        ->with('success', 'Entreprises updated successfully.');
    }
}

