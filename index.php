<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ports</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="assets/style/datatables.min.css" rel="stylesheet">
    <link href="assets/style/style.css" rel="stylesheet">
</head>

<body>
    <header class="header py-4">
        <div class="container">
            <h1 class="header__title mb-0">Form</h1>
        </div>
    </header>
    <section class="form-sec-cvr">
        <div class="container">
            <div class="form-sec my-5">
                <div class="heading">
                    <h2>Form</h2>
                </div>
                <form class="form my-2" method="post" action="generate.php">
                    <div class="row">
                        <div class="col-6 my-2">
                                <input type="text" id="nameInput" name="Name" class="form-control" required placeholder="Enter Name">
                        </div>
                        <div class="col-6 my-2">
                            <input type="text" id="nameInput" name="Email" class="form-control" required placeholder="Enter Email">
                        </div>
                        <div class="col-12 my-2">
                            <textarea type="text" id="nameInput" name="Subject" class="form-control" required placeholder="Enter Subject"></textarea>
                        </div>
                        <div class="col-6 my-2 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary w-100" name="submit" value="Preview">Preview</button>
                        </div>
                        <div class="col-6 my-2 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary w-100" name="submit" value="Print">Print</button>
                            <!-- <a href="generate.php?mode=print" class="btn btn-primary w-50" target="_blank">Print</a> -->
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/datatables.min.js"></script>
    <script src="/assets/js/main.js"></script>
</body>

</html>