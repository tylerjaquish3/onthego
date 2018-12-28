<div class="custom-tooltip-content">
    <p class="title">{{ $title }}</p>
    <div class="content">
        <table>
            @foreach($contents as $content)
                {!! $content !!}
            @endforeach
        </table>
    </div>
</div>