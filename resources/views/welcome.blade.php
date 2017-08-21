<!doctype html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ajax CRUD in laravel </title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/master.css') }}">
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top">
    <ul class="nav navbar-nav">
        <li><a href="">Laravel Ajax</a></li>

    </ul>
</nav>

<br><br><br><br>
<div class="container">


    {{--<div class="form-group row add">--}}
        {{--<div class="col-md-8">--}}
            {{--<input type="text" class="form-control" id="name" name="name"--}}
                   {{--placeholder="Enter some name" required>--}}
            {{--<p class="error text-center alert alert-danger hidden"></p>--}}
        {{--</div>--}}
        {{--<div class="col-md-4">--}}
            {{--<button class="btn btn-primary" type="submit" id="add">--}}
                {{--<span class="glyphicon glyphicon-plus"></span> ADD--}}
            {{--</button>--}}
        {{--</div>--}}
    {{--</div>--}}



    <button class="new-modal btn btn-danger">
        <span class="glyphicon glyphicon-trash"></span> New++
    </button>




    {{ csrf_field() }}


    <div class="table-responsive text-center">
        <table class="table table-borderless" id="table">
            <thead>
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">Name</th>
                <th class="text-center">Actions</th>
            </tr>
            </thead>
            @foreach($data as $item)
                <tr class="item{{$item->id}}">
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td><button class="edit-modal btn btn-info" data-id="{{$item->id}}"
                                data-name="{{$item->name}}">
                            <span class="glyphicon glyphicon-edit"></span> Edit
                        </button>
                        <button class="delete-modal btn btn-danger"
                                data-id="{{$item->id}}" data-name="{{$item->name}}">
                            <span class="glyphicon glyphicon-trash"></span> Delete
                        </button></td>
                </tr>
            @endforeach
        </table>
    </div>
</div>





<!-- new -->
<div id="myModalNew" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title modal-title-new"></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="name">Name:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name"
                                   placeholder="Enter some name" required>
                            <p class="error text-center alert alert-danger hidden"></p>
                        </div>
                    </div>
                </form>

                {{--<div class="form-group row add">--}}
                    {{--<div class="col-md-8">--}}
                        {{--<input type="text" class="form-control" id="name" name="name"--}}
                               {{--placeholder="Enter some name" required>--}}
                        {{--<p class="error text-center alert alert-danger hidden"></p>--}}
                    {{--</div>--}}
                {{--</div>--}}



            </div>

            <div class="modal-footer modal-footer-new">
                <button type="button" class="btn actionBtnNew" data-dismiss="modal">
                    <span id="footer_action_button_new" class='glyphicon'> </span>
                </button>
                <button type="button" class="btn btn-warning" data-dismiss="modal">
                    <span class='glyphicon glyphicon-remove'></span> Close
                </button>
            </div>

        </div>
    </div>
</div>











<!-- edit -->
<div id="myModalEdit" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title modal-title-edit"></h4>
            </div>

            <div class="modal-body">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="id">ID:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="fid" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="name">Name:</label>
                        <div class="col-sm-10">
                            <input type="name" class="form-control" id="n">
                        </div>
                    </div>
                </form>

                <div class="modal-footer modal-footer-edit">
                    <button type="button" class="btn actionBtnEdit" data-dismiss="modal">
                        <span id="footer_action_button_edit" class='glyphicon'> </span>
                    </button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">
                        <span class='glyphicon glyphicon-remove'></span> Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>





<!-- delete -->
<div id="myModalDelete" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title modal-title-delete"></h4>
            </div>

            <div class="modal-body">
                <div>
                    Are you Sure you want to delete <span class="dname"></span> ? <span
                            class="hidden did"></span>
                </div>
                <div class="modal-footer modal-footer-delete">
                    <button type="button" class="btn actionBtnDelete" data-dismiss="modal">
                        <span id="footer_action_button_delete" class='glyphicon'> </span>
                    </button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">
                        <span class='glyphicon glyphicon-remove'></span> Close
                    </button>
                </div>


            </div>
        </div>
    </div>
</div>







{{--<script src="{{ asset('js/app.js') }}"></script>--}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>