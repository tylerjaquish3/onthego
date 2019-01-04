@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <!-- page content -->
    <div class="page-title">
        <div class="title_left">
            <h1>Admin Dashboard</h1>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel dashboard_graph">
                <div class="x_title">
                    <h2>Blog Posts</h2>
                    <a href="/posts/create" class="btn btn-primary">New Post</a>
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
                    <table id="datatable-posts" class="table stripe compact nowrap" width="100%">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Created By</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection

@push('scripts')

<script>
    
    $tableUnshipped = $('#datatable-posts').DataTable({
        ajax: {
            url: "{{ route('dashboard.posts') }}",
        },
        columns: [
            { data: 'title', name: 'title'},
            { data: 'is_active', name: 'is_active'},
            { data: 'creator.name', name: 'creator'},
            { data: 'created_at', name: 'created_at'}
        ],
        serverSide: true,
        order: [[3, "asc"]],
    });

</script>
@endpush