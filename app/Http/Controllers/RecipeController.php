<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Recipe;
use App\Ingredient;
use App\User;
use Carbon\Carbon;

class RecipeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

    public function index() 
    {
    	$recipes = Recipe::all();

    	return view('index', compact('recipes'));
    }

    public function show(Recipe $recipe)
    {
        $ingredients = $this->IngredientsToArray($recipe->ingredients);
        $time = $recipe->created_at->toFormattedDateString();

    	return view('recipe.recipe', compact('recipe', 'ingredients', 'time'));
    }

    public function showOwn()
    {
        $user = User::find(auth()->id());
        $recipes = $user->recipes;

        return view('recipe.list', compact('recipes'));
    }

    public function create()
    {
        return view('recipe.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'preview' => 'required',
            'ingredients' => 'required',
            'body' => 'required|max:2000'
        ]);

        $ingredients = $this->IngredientsOneLine($request->input('ingredients'));

        if ($request->hasFile('img')) {
            $path = Storage::putfile('public/images', $request->file('img'));
        }
        else {
            $path = 'public/images/no_image.png';
        }
        

        $recipe = new Recipe([
            'name' => $request->input('name'),
            'user_id' => auth()->id(),
            'preview' => $request->input('preview'),
            'ingredients' => $ingredients,
            'img' => $path,
            'body' => $request->input('body')
        ]);

        $recipe->save();

        return redirect()->route('index');
    }

    public function edit(Recipe $recipe)
    {
        if (auth()->id() == $recipe->user->id) {

            $ingredients = $this->IngredientsMultiLine($recipe->ingredients);

            return view('recipe.edit', ['recipe' => $recipe, 'ingredients' => $ingredients]);
        }
        else {
            return redirect()->route('index');
        }
    }

    public function destroy(Request $request)
    {
        $recipe = Recipe::find($request->input('id'));
        if (!($recipe->img == "public/img/no_image.png")) {
            Storage::delete($recipe->img);
        }
        $recipe->delete();

        
        return redirect()->route('index');
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
