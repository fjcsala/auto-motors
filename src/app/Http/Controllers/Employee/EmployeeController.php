<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Branch;

class EmployeeController extends Controller
{
    private $employee;
    private $branch;

    protected function getStates ()
    {
        return array
        (
            'AC', 'AL', 'AP', 'AM', 'BA',
            'CE', 'DF', 'ES', 'GO', 'MA',
            'MT', 'MS', 'MG', 'PA', 'PB',
            'PR', 'PE', 'PI', 'RJ', 'RN',
            'RS', 'RO', 'RR', 'SC', 'SP',
            'SE', 'TO'
        );
    }

    protected function getSex ()
    {
        return array
        (
            'Feminino', 'Masculino', 'Outro'
        );
    }

    public function __construct (Employee $employee, Branch $branch)
    {
        $this -> employee = $employee;
        $this -> branch = $branch;
    }

    public function register ()
    {
        $dataDB = $this -> branch -> all();

        $sex = $this -> getSex();

        $states = $this -> getStates();

        return view ('home.employee.register.index', compact('dataDB', 'states', 'sex'));
    }

    public function registerBeta ()
    {
        $dataDB = $this -> branch -> all();

        $sex = $this -> getSex();

        $states = $this -> getStates();

        return view ('home.employee.register.beta.index', compact('dataDB', 'states', 'sex'));
    }

    public function create (Request $request)
    {
        $dataForm = $request -> all();

        // format birth_date
        $dataForm['birth_date'] = str_replace('/', '-', $dataForm['birth_date']);
        $dataForm['birth_date'] = explode('-', $dataForm['birth_date']);
        $dataForm['birth_date'] = $dataForm['birth_date'][2].'-'.$dataForm['birth_date'][1].'-'.$dataForm['birth_date'][0];

        // encrypt password
        $dataForm['password'] = md5($dataForm['password']);

        $validateForm = validator($dataForm, $this -> employee -> rules, $this -> employee -> errorMessages);

        if ($validateForm -> fails())
        {
            return redirect('/home/employee/register') -> withErrors($validateForm) -> withInput();
        }
        
        $create = $this -> employee -> create($dataForm);

        return redirect('/home/employee/list');
    }

    public function edit (Request $request, $id)
    {
        $dataEmployee = $this -> employee -> find($id);

        // format birth_date
        $dataEmployee['birth_date'] = explode('-', $dataEmployee['birth_date']);
        $dataEmployee['birth_date'] = $dataEmployee['birth_date'][2].'-'.$dataEmployee['birth_date'][1].'-'.$dataEmployee['birth_date'][0];

        $dataBranch = $this -> branch -> all();

        $states = $this -> getStates();

        $sex = $this -> getSex();
        
        return view('home.employee.edit.index', compact('dataEmployee', 'dataBranch', 'states', 'sex'));
    }

    public function update (Request $request, $id)
    {
        $dataForm = $request -> all();

        // format brith_date
        $dataForm['birth_date'] = str_replace('/', '-', $dataForm['birth_date']);
        $dataForm['birth_date'] = explode('-', $dataForm['birth_date']);
        $dataForm['birth_date'] = $dataForm['birth_date'][2].'-'.$dataForm['birth_date'][1].'-'.$dataForm['birth_date'][0];

        // format salary
        $dataForm['salary'] = str_replace('.', '', $dataForm['salary']);
        $dataForm['salary'] = str_replace(',', '', $dataForm['salary']);

        // encrypt password
        $dataForm['password'] = md5($dataForm['password']);

        $employeeEdit = $this -> employee -> find($id);

        $dataValidate = validator($dataForm, $this -> employee -> rules, $this -> employee -> errorMessages);

        if ($dataValidate -> fails())
        {
            return redirect ("/home/employee/edit/{$id}") -> withErrors($dataValidate) -> withInput();
        }

        $employeeEdit -> update($dataForm);

        return redirect ('/home/employee/list');
    }

    public function active (Request $request, $id)
    {
        $dataForm = $request -> only('id');

        $employeeEdit = $this -> employee -> find($id);

        $employeeEdit -> where('id', '=', $id) -> update(['status' => 1]);

        return redirect ('/home/employee/list');
    }

    public function inactive (Request $request, $id)
    {
        $dataForm = $request -> only('id');

        $employeeEdit = $this -> employee -> find($id);

        $employeeEdit -> where('id', '=', $id) -> update(['status' => 0]);

        return redirect ('/home/employee/list');
    }

    public function list ()
    {
        $dataEmployee = $this -> employee -> all();
        
        return view('home.employee.list.index', compact('dataEmployee'));
    }

    public function listBeta ()
    {
        $dataEmployee = $this -> employee -> all();
        
        return view('home.employee.list.beta.index', compact('dataEmployee'));
    }
}