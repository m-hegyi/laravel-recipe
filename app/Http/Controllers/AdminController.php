<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function adminIndex()
    {
    	$recipes = Recipe::all();

    	return view('admin.index', compact('recipes'));
    }

    public function adminEdit(Recipe $recipe)
    {
        $ingredients = $this->IngredientsMultiLine($recipe->ingredients);

        return view('admin.edit', ['recipe' => $recipe, 'ingredients' => $ingredients]);
    }

    public function adminUpdate(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:5',
            'preview' => 'required|min:10',
            'ingredients' => 'required|min:10',
            'body' => 'required|min:10|max:2000'
        ]);

        $recipe = Recipe::find($request->input('id'));

        $recipe->name = $request->input('name');
        $recipe->preview = $request->input('preview');
        $recipe->ingredients = $this->IngredientsOneLine($request->input('ingredients'));
        $recipe->body = $request->input('body');

        $recipe->save();
        
        return redirect()->route('admin.index')->with('info', 'Recipe Updated');
    }

    public function adminDelete($id)
    {
        $recipe = Recipe::find($id);

        if (!($recipe->img == "public/images/no_image.png")) {
            Storage::delete($recipe->img);
        }
        $recipe->delete();

        return redirect()->route('admin.index')->with('info', 'The recipe deleted');
    }

    private function IngredientsOneLine($input) 
    {
        $ingredients = str_replace(",", "", $input);                           //delete the commas
        $ingredients = str_replace("|", ":", $ingredients);
        $ingredients = str_replace("\r", "|", $ingredients);              //replece the lines on '|'                 

        return $ingredients;
    }

    private function IngredientsToArray($ingredients) 
    {
        $array = explode("|", $ingredients);

        return $array;
    }

    private function IngredientsMultiLine($input)
    {
        $input = str_replace("|", ",\r", $input);

        return $input;
    }
}
