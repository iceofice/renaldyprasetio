<x-admin>
    <div class="row">
        <div class="col-12 col-xl-8 mb-4 mb-xl-2">
            <h3 class="font-weight-bold">Categories Table</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary mb-4">
                                Add Category
                            </a>
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

    <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="delete-modal-label"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="delete-modal-label">Delete confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this records?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <form id="delete-form" method="POST">
                        @csrf
                        @method('DELETE')
                        <button on class="btn btn-danger" onclick="deleteRecord(event, this)">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="scripts">
        <script>
            var routeName = '/admin/categories/';

            var button = null;

            function onDeleteButtonPressed(event, el) {
                button = $(el);
            }

            function getEditButton(id) {
                return '<a href="' +
                    routeName + id +
                    '/edit" class="btn btn-inverse-info btn-rounded"><i class="ti-pencil"></i></a>';
            }

            function getDeleteButton(id) {
                return '<a href="' +
                    routeName + id +
                    '" class="ml-2 btn btn-inverse-danger btn-rounded" onclick="onDeleteButtonPressed(event, this)" data-toggle="modal" data-target="#delete-modal"><i class="ti-trash"></i></a>';
            }

            function getButtons(id) {
                return getEditButton(id) + getDeleteButton(id);
            }

            function deleteRecord(event, el) {
                event.preventDefault();
                $("#delete-form").attr('action', button.attr('href'));
                $("#delete-form").submit();
            }

            $(function() {
                @if (\Session::get('success_message'))
                    $.toast({
                        text: "{{ \Session::get('success_message') }}",
                        position: 'top-right',
                        icon: 'success'
                    });
                @endif

                var table = $('#user-table').DataTable({
                    data: @json($categories),
                    columns: [{
                            title: 'ID',
                            data: 'id',
                            width: '10%'
                        },
                        {
                            title: 'Title',
                            data: 'title'
                        },
                        {
                            title: 'Action',
                            width: '25%',
                            data: 'id',
                            render: (data) => getButtons(data)
                        },

                    ],
                });
            });
        </script>
    </x-slot>
</x-admin>
