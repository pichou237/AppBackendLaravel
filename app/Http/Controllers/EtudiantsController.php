<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etudiants;

class EtudiantsController extends Controller
{
    /**
         * @OA\Get(
         *     path="/api/etudiants",
         *     tags={"Étudiants"},
         *     summary="Lister tous les étudiants",
         *     @OA\Response(
         *         response=200,
         *         description="Liste des étudiants",
         *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Etudiant"))
         *     )
         * )
    */

    public function index(){
            return Etudiants::all();
        }


    /**
         * @OA\Get(
         *     path="/api/etudiants/{matricule}",
         *     tags={"Étudiants"},
         *     summary="recuperation d'un étudiant ",
         *     @OA\Response(
         *         response=200,
         *         description="Recuperation d'un etudiant precis en fonction de son matricule",
         *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Etudiant"))
         *     )
         * )
    */

    function findEtudiant(Request $request){
        $matricule= $request->matricule;
        $etudiant = Etudiants::findOrFail($matricule);

        return [$etudiant];
    }



    
    /**
         * @OA\Post(
         *     path="/api/etudiants",
         *     tags={"Étudiants"},
         *     summary="Insertion d'un nouveau etudiant ",
         *     @OA\Response(
         *         response=200,
         *         description="Insertion d'un nouveau etudiant dans la table etudiant",
         *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Etudiant"))
         *     )
         * )
    */


  public function store(Request $request)
  {
    $request->validate([
      'matricule' => 'required',
      'name' => 'required',
      'lastName' =>'required',
      'contact' => 'required',
      'date' => 'required',
      'sexe' => 'required' ,
      'adresse' => 'required',
      'adresse' => 'required',
      'photo' => 'required',
      'cv' =>'required',
      'id_fil' =>'required'
    ]);

    Etudiants::create($request->all());
    return redirect()->route('posts.index')
      ->with('success', 'Post created successfully.');
  }


      /**
         * @OA\Delete(
         *     path="/api/etudiants/{matricule}",
         *     tags={"Étudiants"},
         *     summary="Suppression d'un etudiant ",
         *     @OA\Response(
         *         response=200,
         *         description="Suppression d'un etudiant dans la table etudiant",
         *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Etudiant"))
         *     )
         * )
    */

        public function destroy($matricule){

            $post = Etudiants::find($matricule);
            $post->delete();
            return redirect()->route('posts.index')
            ->with('success', 'Post deleted successfully');
        }

  /**
         * @OA\Put(
         *     path="/api/etudiants/{matricule}",
         *     tags={"Étudiants"},
         *     summary="Mise a jour d'un etudiant ",
         *     @OA\Response(
         *         response=200,
         *         description="Mise a jour d'un etudiant dans la table etudiant",
         *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Etudiant"))
         *     )
         * )
    */



  public function update(Request $request, $matricule){
    $request->validate([
        'matricule' => 'required',
        'name' => 'required',
        'lastName' =>'required',
        'contact' => 'required',
        'date' => 'required',
        'sexe' => 'required' ,
        'adresse' => 'required',
        'adresse' => 'required',
        'photo' => 'required',
        'cv' =>'required',
        'id_fil' =>'required'
      ]);

    $post = Etudiants::find($matricule);
    $post->update($request->all());

    return redirect()->route('posts.index')
      ->with('success', 'Post updated successfully.');
  }

}
