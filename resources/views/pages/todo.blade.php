@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-2">
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-body mbody">
                    <div>
                        <p class="title">TO DO LIST </p>
                        <p class="sub">Show Category :
                            @foreach ($categories as $cat)
                                <a href="{{ route('home') }}?cat={{ $cat->id }}"> {{ $cat->name }}</a>|
                            @endforeach
                            <a href="{{ route('home') }}?cat=0"> All</a>|
                        </p>
                    </div>
                    <div id="todo-list">
                        @include('pages.partial.todos')
                    </div>
                    <hr>
                    <div>
                        <p class="title">Categories</p>
                        <form id="myform" action="{{ route('add.todo') }}">

                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="addtodo" class="my-label">Add TO DO</label>
                                <div class="row plr-15">
                                    <input type="text" required class="form-control col-12 " name="details">
                                </div>
                                <label for="category_name" class="my-label">Category</label>
                                <div class="row plr-15">
                                    <select required class="form-control col-6" name="category_id">
                                        <option value="">Choose Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>


                                    <button type="submit" id="category-btn" class="col-3 btn my-btn plr-2 ml-15"> Add
                                        TODO</button>
                                </div>

                            </div>
                        </form>

                    </div>


                    <hr class="deep">
                    <div>
                        <p class="title">Categories</p>
                        <div class="form-group">
                            <label for="category_name" class="my-label">Add Category</label>
                            <div class="row plr-15">
                                <input type="text" required class="form-control col-9 " id="category"> <button
                                    id="add-category" class="col-2 btn my-btn plr-2 ml-15"> Add Category</button>
                            </div>

                        </div>

                    </div>
                    <div id="categories">

                        @include('pages.partial.categories')

                    </div>


                </div>
            </div>
        </div>
        <div class="col-2">

        </div>


    </div>
@endsection


@section('scripts')
    <script>
    // fuction to load todos
        function loadtodos() {

            $.get("{{ route('todos') }}", function(data, status) {
                $('#todo-list').html(data);
            });



        }



   // adds task category
        $('#add-category').on('click', function() {

            let category = $('#category').val();

            if (category == "") {
                alert("please write a category first");
                $('#category').focus();
                return;
            }

            $.post("{{ route('add.category') }}", {
                    _token: "{{ csrf_token() }}",
                    name: category,

                },
                function(data, status) {
                    if (data == 0) {
                        alert('Somthing went wrong !');
                    } else {
                        $('#categories').html(data);
                        $('#category').val("");
                    }

                });


        })







 // adds task category wise

        $(document).on('submit', '#myform', function(e) {
            e.preventDefault();
            $.ajax({
                method: "POST",
                url: $(this).prop('action'),
                data: new FormData(this),
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    if (data == 1) {
                        alert("success");
                        loadtodos();
                        $('#myform')[0].reset();
                    } else {
                        alert("failed");
                        
                    }

                }

            });

        });
    </script>
@endsection
