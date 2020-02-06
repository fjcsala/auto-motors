<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Branch;
use App\Models\Employee;
use App\Models\Car;

class DashboardController extends Controller
{
    private $branch;
    private $employee;
    private $car;

    public function __construct (Branch $branch)
    {
        $branch = $this -> branch;
        $employee = $this -> employee;
        $car = $this -> car;
    }

    protected function totalBranch ()
    {
        $count = Branch :: all() -> where('status', '=', 1) -> count();
        return $count;
    }

    public function totalEmployee()
    {
        $count = Employee :: all() -> where('status', '=', 1) -> count();
        return $count;
    }

    public function totalCar()
    {
        $count = Car :: all() -> count();
        return $count;
    }

    public function dashboard ()
    {
        $totalBranch = $this -> totalBranch();
        $totalEmployee = $this -> totalEmployee();
        $totalCar = $this -> totalCar();
        return view('home.index', compact('totalBranch', 'totalEmployee', 'totalCar'));
    }
}