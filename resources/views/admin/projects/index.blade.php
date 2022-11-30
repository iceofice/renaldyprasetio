<x-admin>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">Projects Table</p>
                    <div class="row">
                        <div class="col-12">
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
        {{-- <script>
            (function($) {
                'use strict';
                $(function() {
                    var table = $('#user-table').DataTable({
                        data: @json($users),
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
        </script> --}}
    </x-slot>
</x-admin>
