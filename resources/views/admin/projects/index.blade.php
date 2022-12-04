<x-admin>
    <div class="row">
        <div class="col-12 col-xl-8 mb-4 mb-xl-2">
            <h3 class="font-weight-bold">Projects Table</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <a href="{{ route('admin.projects.create') }}" class="btn btn-primary mb-4">Add Project</a>
                            <div class="table-responsive">
                                <table id="user-table" class="display expandable-table" style="width:100%">
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="scripts">
        <script>
            (function($) {
                'use strict';
                $(function() {
                    var table = $('#user-table').DataTable({
                        data: @json($projects),
                        columns: [{
                                title: 'ID',
                                data: 'id'
                            },
                            {
                                title: 'Name',
                                data: 'name'
                            },
                            {
                                title: 'Email',
                                data: 'email'
                            },
                        ],
                    });
                    $('#user-table tbody').on('click', 'td.details-control', function() {
                        var tr = $(this).closest('tr');
                        var row = table.row(tr);

                        if (row.child.isShown()) {
                            // This row is already open - close it
                            row.child.hide();
                            tr.removeClass('shown');
                        } else {
                            // Open this row
                            row.child(format(row.data())).show();
                            tr.addClass('shown');
                        }
                    });
                });
            })(jQuery);
        </script>
    </x-slot>
</x-admin>
