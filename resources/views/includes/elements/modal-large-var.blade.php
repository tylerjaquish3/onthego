<!-- Large modal -->

<div class="modal fade" id="modal-{{ $modal_id }}" tabindex="-1" role="dialog"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h2 class="modal-title" id="{{ $modal_label }}">{{ $modal_title }}
                </h2>
            </div>

            <div class="modal-body-container">
                <div class="modal-nav">
                    <!-- required for floating -->
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs tabs-left">
                        @foreach($sections as $section)
                            <li class="{{ 'true' == $section['active'] ? 'active' : '' }}">
                                <a href="#modal_{{ $section['id'] }}" data-toggle="tab">{{ $section['title'] }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="modal-body">
                    <div class="tab-content">
                        @foreach($sections as $section)
                            <div class="tab-pane {{ 'true' == $section['active'] ? 'active' : '' }}"
                                 id="modal_{{ $section['id'] }}">
                                {!! $section['content'] !!}
                            </div>
                        @endforeach
                    </div>
                    <div class="clear"></div>
                </div>

            </div>


        </div>
    </div>
</div>
