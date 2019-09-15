<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/signin.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/starter-template.css') }}" rel="stylesheet">
    <style>
        
        input[type="file"]{
            display: none;
        }
        
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="{{url('/admin/main')}}">Admin panel</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
            </ul>
            <form class="form-inline my-2 my-lg-0" action="{{url('admin/checkPass')}}" enctype="multipart/form-data">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Log out</button>
            </form>
        </div>
    </nav>
    <main role="main" class="container ">
        <div class="starter-template">
            <table width="100%" border="1">
            <tr>
                @foreach($columns as $column)
                <th height="50px" width="250px">{{ucfirst($column)}}</td>
                @endforeach
                <th colspan="3"></th>
            </tr><tr>
            <form class="my-2 my-lg-0" action="{{url('/admin/action')}}" enctype="multipart/form-data">
                @foreach($columns as $column)
                    <td height="50px">
                        <input class="form-control mr-sm-2" type="text" placeholder="{{$column}}" aria-label="Search" name="{{$column}}">
                    </td>
                @endforeach
                <td colspan="3"><button class="btn btn-outline-success my-2 my-sm-0" value="add" name="button" type="submit">Add</button></td>
                </form>
            </tr>
        @foreach($products as $product)
            <tr>
                <form class="my-2 my-lg-0" action="{{url('/admin/action')}}" enctype="multipart/form-data">
                @foreach($columns as $column)
                    <td height="50px">
                        <input class="form-control mr-sm-2" type="text" value="{{$product->$column}}" aria-label="Search" name="{{$column}}">
                    </td>
                @endforeach
                <td height="50px">
                    <button class="btn btn-outline-success my-2 my-sm-0" value="{{$product->products_id}}" name="button" type="submit">Update</button>
                </td>
                <td height="50px">
                    <button class="btn btn-outline-success my-2 my-sm-0" value="delete" name="button" type="submit">Delete</button>
                </td>
                </form>
                <td>
                    <form class="my-2 my-lg-0" action="{{url('/admin/action')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="btn btn-outline-success my-2 my-sm-0">
                            <label>
                                 <input type="file" aria-label="Search" name="image">
                                 <span>Select image</span>
                            </label>
                        </div>
                        
                        <button class="btn btn-outline-success my-2 my-sm-0" name="products_id" value="{{$product->products_id}}" type="submit">Change image</button>
                    </form>
                </td>
            </tr>
        @endforeach
           </table>
        </div>
    </main>
</body>
</html>
