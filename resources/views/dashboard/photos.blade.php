@extends('layouts.app')

@section('title', 'Admin Photos')

@section('content')
    <!-- page content -->
    <div class="page-title">
        <div class="title_left">
            <h1>Admin Photos</h1>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Blog Photos</h2>

                    <ul class="nav navbar-right panel_toolbox">
                        <li>
                            <a class="collapse-link" data-toggle="tooltip" data-placement="left" title="" data-original-title="Collapse Area">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="container">
                        <div class="row">
                            <a id="save_photos" class="btn btn-success">Save Changes</a>
                            <a href="/admin/photos/create" class="btn btn-primary">Upload Photos</a>
                        </div>

                        <form id="editPhotoForm">
                            <?php $count = 0; ?>
                            @foreach ($photos as $photo)

                                @if ($count % 2 === 1)
                                <div class="row">
                                @endif
                                    <div class="col-xs-12 col-md-2">
                                        <img src="/img/dummies/works/{{ $photo->path }}" width="100%">
                                    </div>
                                    <div class="col-xs-12 col-md-4">
                                        <textarea name="caption[{{$photo->id}}]" class="form-control full-width">{{ $photo->caption }}</textarea>
                                        <input type="checkbox" name="is_active[{{$photo->id}}]" @if($photo->is_active) checked @endif> Active
                                    </div>
                                @if ($count % 2 === 1)    
                                </div>
                                @endif

                                <?php $count++; ?>
                            @endforeach

                        </form>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@push('scripts')
<script>
    
    // Send form to controller
    $('#save_photos').on('click', function(e) {
        
        $.ajax({
            url: "{{ route('dashboard.updatePhotos') }}",
            method: 'PATCH',
            dataType: 'json',
            data:  $("#editPhotoForm").serialize(),
            success: function (data) {
                addAlertToPage('success', 'Success', 'Photos were saved.', 5);
            }
        });
    });

</script>
@endpush