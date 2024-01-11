<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Pizza;
use Illuminate\Support\Facades\DB;

class PizzaController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth')->except('create', 'store');
    }

    public function index(): View
    {
        $pizzas = Pizza::latest()->get();
    
        return view('pizza.index', [
            'pizzas' => $pizzas
        ]);
    }

    public function show($id): View
    {
        $pizza = Pizza::findOrFail($id);

        return view('pizza.show', [
            'pizza' => $pizza
        ]);
    }

    public function create(): View
    { 
        return view('pizza.create');
    }

    public function store(){
        $pizza = new Pizza();

        $pizza->type = request('type');
        $pizza->base = request('base');
        $pizza->name = request('name');

        $toppings = request('toppings');
        if(!empty($toppings))
            $pizza->toppings = $toppings;
        else
            $pizza->toppings = [];

        $pizza->save();

        return redirect('/')->with('mssg', 'Thanks for your order '.$pizza->name);
    }

    public function destroy($id){
        $pizza = Pizza::findOrFail($id);
        $pizza->delete();

        return redirect('/')->with('mssg', 'Order completed for '.$pizza->name);
    }
}
