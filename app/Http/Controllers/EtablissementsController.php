<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etablissements;

class EtablissementsController extends Controller
{
    //

     /**
         * @OA\Get(
         *     path="/api/etablissements",
         *     tags={"Etablissements"},
         *     summary="Lister tous les etablissements",
         *     @OA\Response(
         *         response=200,
         *         description="Liste des etablissements",
         *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Etablissement"))
         *     )
         * )
    */

    public function index(){
        return Etablissements::all();
    }


/**
     * @OA\Get(
     *     path="/api/etablissements/{id}",
     *     tags={"Etablissements"},
     *     summary="recuperation d'un etablissement ",
     *     @OA\Response(
     *         response=200,
     *         description="Recuperation d'un etablissement precis en fonction de son identifiant",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Etablissement"))
     *     )
     * )
*/

function findEtudiant(Request $request){
    $id= $request->id;
    $etablissement = Etablissements::findOrFail($id);

    return [$etablissement];
}




/**
     * @OA\Post(
     *     path="/api/etablissements",
     *     tags={"Etablissements"},
     *     summary="Insertion d'un nouveau etablissement ",
     *     @OA\Response(
     *         response=200,
     *         description="Insertion d'un nouveau etablissement dans la table Etablissements",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Etablissement"))
     *     )
     * )
*/


public function store(Request $request)
{
$request->validate([
  'id' => 'required',
  'name' => 'required',
  'type_etab' =>'required',
  'ville' => 'required',
  'contact' => 'required',
  'email' =>'required'
]);

Etablissements::create($request->all());
return redirect()->route('posts.index')
  ->with('success', 'etablissement created successfully.');
}


  /**
     * @OA\Delete(
     *     path="/api/etablissements/{id}",
     *     tags={"Etablissements"},
     *     summary="Suppression d'un etablissement ",
     *     @OA\Response(
     *         response=200,
     *         description="Suppression d'un etablissement dans la table Etablissements",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Etablissement"))
     *     )
     * )
*/

    public function destroy($id){

        $etablissement = Etablissements::find($id);
        $etablissement->delete();
        return redirect()->route('posts.index')
        ->with('success', 'etablissement deleted successfully');
    }

/**
     * @OA\Put(
     *     path="/api/etablissements/{id}",
     *     tags={"Etablissements"},
     *     summary="Mise a jour d'un etablissement ",
     *     @OA\Response(
     *         response=200,
     *         description="Mise a jour d'un etablissement dans la table Etablissements",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Etablissement"))
     *     )
     * )
*/



public function update(Request $request, $id){
    $request->validate([
        'id' => 'required',
        'name' => 'required',
        'type_etab' =>'required',
        'ville' => 'required',
        'contact' => 'required',
        'email' =>'required'
      ]);

$etablissement = Etablissements::find($id);
$etablissement->update($request->all());

return redirect()->route('posts.index')
  ->with('success', 'etablissement updated successfully.');
}
}
