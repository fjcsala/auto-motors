<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Branch;
use PDF;

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

    public function upperCaseChassi ($data)
    {
        if (isset($data))
        {
            $data = strtoupper($data);
        }
        return $data;
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

        $dataForm['chassi'] = $this -> upperCaseChassi($dataForm['chassi']);

        $validateForm = validator($dataForm, $this -> car -> rules, $this -> car -> errorMessages);

        if ($validateForm -> fails())
        {
            return redirect('home/car/register') -> withErrors($validateForm) -> withInput();
        }

        $create = $this -> car -> create($dataForm);

        return redirect() -> route('car.list') -> with('message', 'AUTOMÓVEL CADASTRADO COM SUCESSO!');

    }

    public function edit (Request $request, $id)
    {
        $dataCar = $this -> car -> find($id);

        $categories = $this -> getCategory();

        $dataBranch = $this -> branch -> all();

        return view("home.car.edit.index", compact('dataCar', 'categories', 'dataBranch'));
    }

    public function editBeta (Request $request, $id)
    {
        $dataCar = $this -> car -> find($id);

        $categories = $this -> getCategory();

        $dataBranch = $this -> branch -> all();

        return view("home.car.edit.beta.index", compact('dataCar', 'categories', 'dataBranch'));
    }

    public function update (Request $request, $id)
    {
        $dataForm = $request -> all();

        $dataForm['chassi'] = $this -> upperCaseChassi($dataForm['chassi']);

        $carEdit = $this -> car -> find($id);

        $validateForm = validator($dataForm, $this -> car -> rules, $this -> car -> errorMessages);

        if ($validateForm -> fails())
        {
            return redirect("/home/car/edit/{$id}") -> withErrors($validateForm) -> withInput();
        }

        $carEdit -> update($dataForm);

        return redirect() -> route('car.list') -> with('message', 'AUTOMÓVEL ATUALIZADO COM SUCESSO!');
    }

    public function list ()
    {
        $dataCar = $this -> car -> all();
        $dataBranch = $this -> branch -> all();

        return view('home.car.list.index', compact('dataCar', 'dataBranch'));
    }

    public function view (Request $request, $id)
    {
        $dataCar = $this -> car -> find($id);

        $dataBranch = $this -> branch -> all();

        return view('home.car.view.index', compact('dataCar', 'dataBranch'));
    }

    public function listBeta ()
    {
        $dataCar = $this -> car -> all();

        return view('home.car.list.beta.index', compact('dataCar', 'nameBranch'));
    }

    public function remove (Request $request, $id)
    {
        $dataForm = $request -> only('id');

        $dataCar = $this -> car -> find($id);

        $dataCar -> delete();
        
        return redirect() -> route('car.list') -> with('message', 'AUTOMÓVEL REMOVIDO COM SUCESSO!');
    }

    public function listPdf (Request $request)
    {
        $dateNow = date('d/m/Y');
        $timeNow = date('H:i');
        $reportTitle = 'LISTAGEM DE AUTOMÓVEIS';
        $pdfRequest = $request -> only('branchCheckArray');
        $array = ($pdfRequest['branchCheckArray']);
        $array = explode(',', $array);
        $newArray = array();
            for ($i = 0; $i < sizeof($array); $i ++)
            {
                array_push($newArray, $array[$i]);
            }
        $dataCar = Car :: find($newArray); // return only array data.
        $reportPdf = PDF :: loadview('home.car.list.reports.sintetic.index', compact('dataCar', 'reportTitle', 'dateNow', 'timeNow')) -> setPaper('a4', 'landscape')-> stream('listagem-de-automoveis.pdf');
        return $reportPdf;
    }
}