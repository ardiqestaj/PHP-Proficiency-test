<?php
namespace App\Controllers;
use App\Models\EmployeesModel;

class Employees extends BaseController
{
    public function __construct(){

    $this->EmployeesModel = new EmployeesModel();
    
    }

    public function index(){
    // All employees
            $employees_info = $this->EmployeesModel->findAll();
            $respData = [
                'meta' => array(
                    'code' => 200,
                    'message' => 'Get Employees Record'
                ),
                'data' => array(
                    'employees_info' => $employees_info
                )
            ];
            return $this->response->setJSON($respData);
    }
    
      // single employee
      public function show($id = null){
        $employee_info = $this->EmployeesModel->where('id', $id)->first();
        if($employee_info){
            $respData = [
                'meta' => array(
                    'code' => 200,
                    'message' => 'Get Employees Record'
                ),
                'data' => array(
                    'employees_info' => $employee_info
                )
            ];
            return $this->response->setJSON($respData);
        }else{
            echo 'No excel data exists';
        }
    }
}