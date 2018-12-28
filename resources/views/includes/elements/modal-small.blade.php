<!-- Small modal -->
<div class="modal fade" id="modal-{{ $modal_id }}"  tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                <h2 class="modal-title">{{ $modal_title }}</h2>
            </div>
            <div class="modal-body">
                {!! $modal_content !!}
            </div>
        </div>
    </div>
</div>