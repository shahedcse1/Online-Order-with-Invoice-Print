<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has('alert-' . $msg))
            <p class="alert alert-{{ $msg }}" role="alert">
                @if($msg == 'success')
                    <strong><i class="icon fa fa-check"></i></strong>
                @elseif($msg == 'warning')
                    <strong><i class="icon fa fa-warning"></i></strong>
                @elseif($msg == 'info')
                    <strong><i class="icon fa fa-info"></i></strong>
                @elseif($msg == 'danger')
                    <strong><i class="icon fa fa-ban"></i></strong>
                @endif
                {{ Session::get('alert-' . $msg) }}
            </p>
        @endif
    @endforeach</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

            <script>
                setTimeout( function () {
                    $('.flash-message').hide();
                }, 20000);
            </script>
