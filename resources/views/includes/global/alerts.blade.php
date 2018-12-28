@foreach (['danger', 'error', 'red', 'delete', 'warning', 'orange', 'success', 'info', 'blue', 'view', 'processing',
            'sand'] as $msg)
    @if(Session::has('alert-' . $msg))
        <?php
        $alert = Session::get('alert-' . $msg);
        ?>
        <div class="pnotify-alert" data-type="{{$msg}}"
             data-timeout="{{ isset($alert['timeout']) ? $alert['timeout'] : '0' }}">
            <div class="pnotify-title">{{ isset($alert['title']) ? $alert['title'] : $msg }}</div>
            <div class="pnotify-message">{{ $alert['message'] }}@if(isset($alert['action']))<a href="{{
            $alert['action'] }}" class="btn">{{ $alert['actionTitle'] }}</a>@endif</div>
        </div>
    @endif
@endforeach
@if($errors->all())
    <div class="pnotify-alert" data-type="warning" data-timeout="">
        <div class="pnotify-title">Warning</div>
        <div class="pnotify-message">
            {!! implode('', $errors->all('<div>:message</div>')) !!}
        </div>
    </div>
@endif
@if(Session::has('message'))
    <div class="pnotify-alert" data-type="default" data-timeout="3">
        <div class="pnotify-title">Alert</div>
        <div class="pnotify-message">
            {{ Session::get('message') }}
        </div>
    </div>
@endif

