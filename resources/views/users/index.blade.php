@extends('app')

@section('title', 'Users')

@push('stylesheets')
@endpush

@section('content')
    <!-- page content -->

    <div class="page-title">
        <div class="title_left">
            <h1>Users</h1>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="x_panel">
        <div class="x_title">
            <h2>All Users</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="col-md-12 col-sm-12">
                <table id="datatable-users" class="table stripe compact nowrap" width="100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Last Login</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <td></td>
                        <td></td>
                        <td class="no_search"><select></select></td>
                        <td class="no_search"></td>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <!-- Select2 -->
    <script src="{{ asset("js/select2.full.min.js") }}"></script>

    <script>

        $('#roles-tooltip').tooltip({
            placement: "bottom",
            html: true,
            title: function() {
                return getToolTip("Roles");
            }
        });

        $(function() {
            var usersTable = $('#datatable-users').DataTable({
                ajax: '{{ route('users.users') }}',
                "language": {
                    processing: '<div id="spinner" class="spinner"><img src="/images/ET-logo-color-square-small.png" id="loading_cricle"></div>'
                },
                columns: [
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'role.label', name: 'role.label' },
                    { data: 'updated_at', name: 'users.updated_at' }
                ],
                "order": [[3, "desc"]],
                "footerCallback": function () {
                    var api = this.api();

                    var roleSelect = $('#datatable-users tfoot tr td:nth-child(3) select').select2({
                        // Hide search bar
                        minimumResultsForSearch: -1,
                        placeholder: "Select Role",
                        allowClear: true,
                        ajax: {
                            url: "{{ route('users.roles') }}",
                            dataType: 'json',
                            data: function (data) {
                                return {
                                    term: data.term
                                }
                            }
                        }
                    });

                    roleSelect.on('select2:select', function (e) {
                        usersTable.column(3).search($.trim(e.params.data.text)).draw();
                    });

                    roleSelect.on('select2:unselect', function (e) {
                        usersTable.column(3).search('').draw();
                    });
                }
            });
        });

    </script>
@endpush