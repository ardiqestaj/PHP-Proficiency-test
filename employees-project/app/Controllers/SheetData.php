<?php

namespace App\Controllers;
use \PhpOffice\PhpSpreadsheet\IOFactory;
use App\Models\DepartmentsModel;
use App\Models\EmployeesModel;
use CodeIgniter\I18n\Time; 


class SheetData extends BaseController
{
    public function __construct() {

    $this->DepartmentsModel = new DepartmentsModel;
    $this->EmployeesModel = new EmployeesModel;
    $this->session = \Config\Services::session(); 

}

    // Read data from work sheet
    public function readData()
    {
    
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
        $reader->setReadDataOnly(TRUE);
        $spreadsheet = $reader->load($_FILES['upload_file']['tmp_name']);

        return view('home/showData', ['spreadsheet' => $spreadsheet]);

    }

    // Import data from work sheet to Database
    public function importData()
    {              
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
        $reader->setReadDataOnly(TRUE);
        $spreadsheet = $reader->load($_FILES['upload_file']['tmp_name']);

        $worksheet = $spreadsheet->getActiveSheet();

        // Getting highest row from Department table, which start from L column
        $highestDepRow = $worksheet->getHighestRow('L');

        // Getting highest row from Employees table
        $highestEmpRow = $worksheet->getHighestRow(); // e.g. 10

        // putting data to array
        $worksheet = $spreadsheet->getActiveSheet()->toArray();

        // worksheet return 1 if is empty, so I made it -1
        $row_count = count($worksheet)-1;
        if($row_count) {

            // import departements
            $departamentsArray = array();
            for ($i = 1; $i <= ($highestDepRow -1); ++$i) {
                        
                $departamentsArray[] = array(
                    'department_name'     =>$worksheet[$i][11],
                    'department_leader'   =>$worksheet[$i][12],
                    'department_phone'    =>$worksheet[$i][13]
                );
            }

            $this->DepartmentsModel->insertBatch($departamentsArray);

            // import employees
            $employeesArray = array();
            for ($i = 1; $i <= ($highestEmpRow -1); ++$i) {

                // Time now
                $date_now = Time::today('Europe/Berlin');

                // Convertet Time
                $start_date_format = date("Y-m-d", strtotime($worksheet[$i][7]));
                $start_date = Time::parse($start_date_format, 'Europe/Berlin');

                // Convertet Time
                $end_date_format = date("Y-m-d", strtotime($worksheet[$i][8]));
                $end_date = Time::parse($end_date_format, 'Europe/Berlin');

                // Checking if employee is active or inactiv, for active employee, status is equal to 1, for inactive to 0
                if($end_date->isBefore($date_now)){
                    $status = 0;
                } else {
                    $status = 1;
                };
                
                $employeesArray[] = array(
                    'name'           =>$worksheet[$i][0],
                    'manager'        =>$worksheet[$i][1],
                    'username'       =>$worksheet[$i][2],
                    'email'          =>$worksheet[$i][3],
                    'department'     =>$worksheet[$i][4],
                    'phone_number'   =>$worksheet[$i][5],
                    'address'        =>$worksheet[$i][6],
                    'start_date'     =>$start_date,
                    'end_date'       =>$end_date,
                    'status'         =>$status
                );
            }
            
            $this->EmployeesModel->insertBatch($employeesArray);

            return redirect()->route('read-data-record');
        
        }else{
            echo 'No excel data exists';
        }
    }

    public function readDataFromDb()
    {
        $employees = $this->EmployeesModel->findAll();
        $departments = $this->DepartmentsModel->findAll();
        
        return view('home/showDataRecod', ['employees' => $employees, 'departments' => $departments]);

    }
}