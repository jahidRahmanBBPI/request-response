<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Person Form</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto mt-5">
        <form action="/persons" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header bg-warning">
                    <h1>Create a Person with name and email.</h1>
                </div>
                <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Name</label>
                <input  name="name" type="text" value="Jahid" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Email</label>
                <input name="email" type="email" value="jahid@gmail.com" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Upload Image</label>
                <input type="file" name="image" class="form-control">
                </div>

                <div class="mb-3">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
                </div>
            </div>    
            </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>