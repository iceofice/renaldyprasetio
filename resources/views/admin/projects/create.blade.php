<x-admin>
    <div class="row">
        <div class="col-12 col-xl-8 mb-4 mb-xl-2">
            <h3 class="font-weight-bold">Add Project</h3>
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
                    <form class="forms-sample" action="{{ route('admin.projects.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" placeholder="Title" name="title"
                                id="title">
                        </div>
                        <div class="form-group">
                            <label for="categories">Categories</label>
                            <select name="categories[]" id="categories" class="js-categories-select w-100" multiple>
                                <option value="AL">Alabama</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>File upload</label>
                            <div class="owl-carousel gallery mb-4">
                            </div>
                            <input accept="image/*" type="file" name="img[]" class="file-upload-default" multiple>
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled
                                    placeholder="Upload Image">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="about">About</label>
                            <textarea class="form-control" name="about" id="about" rows="4"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="contributions">Contributions</label>
                            <textarea class="form-control" name="contributions" id="contributions" rows="4"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="technologies">Technologies</label>
                            <select name="technologies[]" id="technologies" class="js-technologies-select w-100"
                                multiple>
                                <option value="AL">Alabama</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <x-slot name="scripts">
        <script>
            (function($) {
                'use strict';

                //Gallery
                var gallery = $('.owl-carousel').owlCarousel({
                    margin: 10,
                    responsive: {
                        0: {
                            items: 1
                        },
                        600: {
                            items: 2
                        },
                        1000: {
                            items: 3
                        }
                    }
                });

                // Image Upload
                $('.file-upload-browse').on('click', function() {
                    var file = $(this).parent().parent().parent().find('.file-upload-default');
                    file.trigger('click');
                });
                $('.file-upload-default').on('change', function() {
                    var input = $(this)[0];

                    var name = Array.from(input.files)
                        .map((file) => (file.name.length > 15 ? file.name.substring(0, 12) + '...' : file.name))
                        .join(', ');

                    $(this).parent().find('.form-control').val(name);

                    var length = $('.item').length;
                    for (var i = 0; i < length; i++) {
                        gallery.trigger('remove.owl.carousel', [i])
                            .trigger('refresh.owl.carousel');
                    }

                    var filesAmount = input.files.length;

                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();

                        reader.onload = function(event) {
                            gallery
                                .trigger('add.owl.carousel',
                                    ['<div class="item"><img src="' + event.target.result + '" /></div>'])
                                .trigger('refresh.owl.carousel')
                        }

                        reader.readAsDataURL(input.files[i]);
                    }
                });

                // Select 2
                if ($(".js-categories-select").length) {
                    $(".js-categories-select").select2();
                }
                if ($(".js-technologies-select").length) {
                    $(".js-technologies-select").select2();
                }
            })(jQuery);
        </script>
    </x-slot>
</x-admin>
