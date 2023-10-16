<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    </head>
    <body>
        <div class="row justify-content-center mt-5 ">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Upload File</h5>
                    </div>
                    <div class="card-body">
                        <form action="/extract-and-insert" method="post" enctype="multipart/form-data">
                            @csrf
                            <div>
                                <label for="">upload zip file</label>
                                <input type="file" name="file_upload" id="" class="form-control">
                                @error('file_upload')
                                    <span class="text-danger">file required</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm mt-2 float-end">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>
