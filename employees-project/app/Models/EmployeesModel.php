<?php

namespace App\Models;

class EmployeesModel extends \CodeIgniter\Model
{
    protected $table = 'employees';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'manager', 'username', 'email', 'department', 'phone_number', 'address', 'start_date', 'end_date', 'status'];
}