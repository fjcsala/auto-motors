<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Branch;

class CarController extends Controller
{
    private $car;
    private $branch;

    protected function getCategory()
    {
        return array
        (
            'Entrada',
            'Hatch Pequeno',
            'Hatch Médio',
            'Sedã Médio',
            'Sedã Grande',
            'SUV',
            'Pick-Up'
        );
    }

    public function __construct (Car $car, Branch $branch)
    {
        $this -> car = $car;
        $this -> branch = $branch;
    }

    public function register ()
    {
        $dataBranch = $this -> branch -> all();

        $categories = $this -> getCategory();

        return view ('home.car.register.index', compact('dataBranch', 'categories'));
    }

    public function registerBeta ()
    {
        $dataBranch = $this -> branch -> all();

        $categories = $this -> getCategory();

        return view ('home.car.register.beta.index', compact('dataBranch', 'categories'));
    }

    public function create (Request $request)
    {
        $dataForm = $request -> all();

        $validateForm = validator($dataForm, $this -> car -> rules, $this -> car -> errorMessages);

        if ($validateForm -> fails())
        {
            return redirect('home/car/register') -> withErrors($validateForm) -> withInput();
        }

        $create = $this -> car -> create($dataForm);

        return redirect('/home/car/list');

    }

    public function edit (Request $request, $id)
    {
        $dataCar = $this -> car -> find($id);

        $categories = $this -> getCategory();

        $dataBranch = $this -> branch -> all();

        return view("home.car.edit.index", compact('dataCar', 'categories', 'dataBranch'));
    }

    public function update (Request $request, $id)
    {
        $dataForm = $request -> all();

        $carEdit = $this -> car -> find($id);

        $validateForm = validator($dataForm, $this -> car -> rules, $this -> car -> errorMessages);

        if ($validateForm -> fails())
        {
            return redirect("/home/car/edit/{$id}") -> withErrors($validateForm) -> withInput();
        }

        $carEdit -> update($dataForm);

        return redirect('/home/car/list');
    }

    public function list ()
    {
        $dataCar = $this -> car -> all();

        return view('home.car.list.index', compact('dataCar'));
    }

    public function listBeta ()
    {
        $dataCar = $this -> car -> all();

        return view('home.car.list.beta.index', compact('dataCar', 'nameBranch'));
    }
}