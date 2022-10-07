<?php $this->extend("layouts/default")?>

<?php $this->section("content")?>

<div class="container">

    <div class="row">
        <h1>Employees</h1>

        <div id="toast" class="toast show bg-success text-white position-fixed top-0 end-0 opacity-75">

            <div class="toast-body pt-2">
                <p class="p-0 m-0">Data has been successfully stored.</p>
            </div>
        </div>
        <div class="d-flex justify-content-between">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="employees-tab" data-bs-toggle="tab" data-bs-target="#employees"
                        type="button" role="tab" aria-controls="employees" aria-selected="true">Employees</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="department-tab" data-bs-toggle="tab" data-bs-target="#department"
                        type="button" role="tab" aria-controls="department" aria-selected="false">Department</button>
                </li>
            </ul>
            <a class="btn btn-primary" href="<?= base_url('/')?>">Go Back</a>
        </div>

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="employees" role="tabpanel" aria-labelledby="employees-tab">
                <table class="table table-striped mt-3">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Manager</th>
                            <th scope="col">Email</th>
                            <th scope="col">Department</th>
                            <th scope="col">Phone number</th>
                            <th scope="col">Address</th>
                            <th scope="col">Start date</th>
                            <th scope="col">End date</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($employees as $employee): ?>
                        <tr>
                            <td><?= $employee['name'] ?></td>
                            <td><?= $employee['manager'] ?></td>
                            <td><?= $employee['email'] ?></td>
                            <td><?= $employee['department'] ?></td>
                            <td><?= $employee['phone_number'] ?></td>
                            <td><?= $employee['address'] ?></td>
                            <td><?= $employee['start_date'] ?></td>
                            <td><?= $employee['end_date'] ?></td>
                            <?php if ($employee['status'] == 1 ){
                                echo '<td> Active </td> ';
                            }else{
                                echo '<td> Inactive </td> ';
                            }?>
                            <?php endforeach; ?>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="department" role="tabpanel" aria-labelledby="department-tab">
                <div class="col-md-6">
                    <table class="table table-striped mt-3">
                        <thead>
                            <tr>
                                <th scope="col">Department name</th>
                                <th scope="col">Departemnt leader</th>
                                <th scope="col">Departemnt phone</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($departments as $departemnt): ?>
                            <tr>
                                <td><?= $departemnt['department_name'] ?></td>
                                <td><?= $departemnt['department_leader'] ?></td>
                                <td><?= $departemnt['department_phone'] ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->endSection()?>