<?php $this->extend("layouts/default")?>

<?php $this->section("content")?>

<div class="container">
    <div class="row">
        <h1>Dashboard</h1>
        <?php 
            $worksheet = $spreadsheet->getActiveSheet();
            // Get the highest row number and column letter referenced in the worksheet
            ?><div class="d-flex justify-content-between">
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
            <a class="btn btn-primary" href="<?= base_url('/');?>">Go Back</a>
        </div>

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="employees" role="tabpanel" aria-labelledby="employees-tab">
                <table class="table table-striped mt-3">
                    <?php
                        $highestRow = $worksheet->getHighestRow(); // e.g. 10
                        $highestColumn = 'I'; // e.g 'F'
                        // Increment the highest column letter
                        $highestColumn++;
                        for ($row = 1; $row <= $highestRow; ++$row) {
                            echo '<tr>' . PHP_EOL;
                            for ($col = 'A'; $col != $highestColumn; ++$col) {
                                echo '<td>' .
                                    $worksheet->getCell($col . $row)
                                        ->getValue() .
                                    '</td>' . PHP_EOL;
                            }
                            echo '</tr>' . PHP_EOL;
                        }
                         ?>
                </table>
            </div>
            <div class="tab-pane fade" id="department" role="tabpanel" aria-labelledby="department-tab">
                <div class="col-md-6">
                    <table class="table table-striped mt-3">
                        <?php
                        $highestColumn = $worksheet->getHighestColumn();
                        $highestRow = $worksheet->getHighestRow('L');
                        for ($row = 1; $row <= $highestRow; ++$row) {
                            echo '<tr>' . PHP_EOL;
                            for ($col = 'L'; $col != $highestColumn; ++$col) {
                                echo '<td>' .
                                    $worksheet->getCell($col . $row)
                                        ->getValue() .
                                    '</td>' . PHP_EOL;
                            }
                            echo '</tr>' . PHP_EOL;
                        }
                         ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->endSection()?>