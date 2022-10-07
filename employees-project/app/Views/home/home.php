<?php $this->extend("layouts/default")?>

<?php $this->section("content")?>

<div class="container">
    <h1>Dashboard</h1>
    <h3 class="mt-3">Read Data</h3>

    <form method="post" action="<?php echo base_url('read-data');?>" enctype="multipart/form-data">
        <div class="form-group">
            <input type="file" name="upload_file" class="form-control" placeholder="Ubpload xlsx dile" id="upload_file"
                required>
        </div>
        <div class="form-group mt-3">
            <button type="submit" name="submit" class="btn btn-primary">Read Data</button>
        </div>
    </form>
    <h3 class="mt-4">Import Data</h3>
    <form method="post" action="<?php echo base_url('import-data');?>" enctype="multipart/form-data">
        <div class="form-group">
            <input type="file" name="upload_file" class="form-control" placeholder="Ubpload xlsx file" id="upload_file"
                required>
        </div>
        <div class="form-group mt-3">
            <button type="submit" name="submit" class="btn btn-primary">Import Data</button>
        </div>
    </form>
</div>

<?php $this->endSection()?>