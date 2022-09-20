<ul>
    @foreach ($todos as $todo)
        <li>

            <div class="form-check row plr-35">
                <label class="form-check-label col-11">
                    <input type="checkbox" class="check form-check-input" data-id={{ $todo->id }} value=""
                        {{ $todo->status == 'done' ? 'checked' : '' }} >
                    @if ($todo->status == 'done')
                        <del>{{ $todo->details }}</del>
                    @else
                        {{ $todo->details }}
                    @endif
                </label>
                <a class="col-1 pull-right" href="{{ route('delete.todo', $todo->id) }}"><i class="cat fa fa-times normal"
                        aria-hidden="true"></i></a>
            </div>

        </li>
    @endforeach
</ul>
<script src="{{asset('assets/js/jquery-1.12.4.min.js')}}"></script>
<script>

    // updates the check list
    $('.check').on('change', function() {
        let id = $(this).attr('data-id');
            $.get("{{ route('update.todo') }}?id=" + id, function(data, status) {
                if (data == 1) {
                    alert("updated");
                    location.reload();
                }
            });

        

    });
</script>
