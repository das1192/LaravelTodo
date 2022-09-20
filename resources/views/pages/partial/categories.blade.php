<ul>


    @foreach ($categories as $category)
        <li><a href="{{route('delete.category',$category->id)}}"><i  class="cat fa fa-times red" aria-hidden="true"></i></a>
            {{ $category->name }}</li>
    @endforeach
</ul>



<script>


</script>