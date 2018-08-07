<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Import</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<form method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>index.php/c_import/import">
    <div class="form-group">
        <label for="file">File Upload</label>
        <input type="file" name="file" class="form-control" id="exampleInputFile">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</body>
</html>