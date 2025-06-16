<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Filieres;

class FilieresController extends Controller
{
      //

     /**
         * @OA\Get(
         *     path="/api/filieres",
         *     tags={"Filieres"},
         *     summary="Lister tous les filieres",
         *     @OA\Response(
         *         response=200,
         *         description="Liste des filieres",
         *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Filiere"))
         *     )
         * )
    */

    public function index(){
        return Filieres::all();
    }


/**
     * @OA\Get(
     *     path="/api/filieres/{id}",
     *     tags={"Filieres"},
     *     summary="recuperation d'un filiere ",
     *     @OA\Response(
     *         response=200,
     *         description="Recuperation d'une filiere precise en fonction de son identifiant",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Filiere"))
     *     )
     * )
*/

function findEtudiant(Request $request){
    $id= $request->id;
    $filiere = Filieres::findOrFail($id);

    return [$filiere];
}




/**
     * @OA\Post(
     *     path="/api/filieres",
     *     tags={"Filieres"},
     *     summary="Insertion d'un nouvelle filiere ",
     *     @OA\Response(
     *         response=200,
     *         description="Insertion d'une nouvelle filiere dans la table Filieres",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Filiere"))
     *     )
     * )
*/


public function store(Request $request){
    $request->validate([
        'id' => 'required',
        'name' => 'required',
        'desccription' =>'required',
        'id_etab' => 'required',
        'id_niveau' => 'required',
      ]);

    Filieres::create($request->all());
    return redirect()->route('posts.index')
    ->with('success', 'etablissement created successfully.');
}


  /**
     * @OA\Delete(
     *     path="/api/filieres/{id}",
     *     tags={"Filieres"},
     *     summary="Suppression d'une filiere ",
     *     @OA\Response(
     *         response=200,
     *         description="Suppression d'une Filiere dans la table Filieres",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Filiere"))
     *     )
     * )
*/

    public function destroy($id){

        $filiere = Filieres::find($id);
        $filiere->delete();
        return redirect()->route('posts.index')
        ->with('success', 'etablissement deleted successfully');
    }

/**
     * @OA\Put(
     *     path="/api/filieres/{id}",
     *     tags={"Filieres"},
     *     summary="Mise a jour d'une filiere ",
     *     @OA\Response(
     *         response=200,
     *         description="Mise a jour d'une filiere dans la table Filieres",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Filiere"))
     *     )
     * )
*/



public function update(Request $request, $id){
    $request->validate([
        'id' => 'required',
        'name' => 'required',
        'desccription' =>'required',
        'id_etab' => 'required',
        'id_niveau' => 'required',
      ]);

        $filiere = Filieres::find($id);
        $filiere->update($request->all());

        return redirect()->route('posts.index')
        ->with('success', 'etablissement updated successfully.');
    }
}
