
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (session()->has('add'))
    <script>
        window.onload = function() {
            notif({
                msg: "{{ trans('dashboard/messages.add') }}",
                type: "success"
            });
        }

    </script>
@endif

@if (session()->has('update'))
    <script>
        window.onload = function() {
            notif({
                msg: "{{ trans('dashboard/messages.update') }}",
                type: "success"
            });
        }

    </script>
@endif

@if (session()->has('delete'))
    <script>
        window.onload = function() {
            notif({
                msg: "{{ trans('dashboard/messages.delete') }}",
                type: "success"
            });
        }

    </script>
@endif
