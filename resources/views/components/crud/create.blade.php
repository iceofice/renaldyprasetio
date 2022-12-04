<x-admin>
    <div class="row">
        <div class="col-12 col-xl-8 mb-4 mb-xl-2">
            <h3 class="font-weight-bold">Add {{ $modelName }}</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form class="forms-sample" action="{{ route('admin.' . $routeName . '.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        {{ $slot }}
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="{{ route('admin.' . $routeName . '.index') }}" class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="scripts">
        @if (isset($scripts))
            {{ $scripts }}
        @endif
    </x-slot>
</x-admin>
