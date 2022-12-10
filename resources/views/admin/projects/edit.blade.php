<x-crud.edit :id="$project->id">
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" placeholder="Title" name="title" id="title"
            value="{{ $project->title }}">
    </div>
    <div class="form-check form-check-flat form-check-primary">
        <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="featured" id="featured"
                @if ($project->featured) checked @endif>
            Featured
            <i class="input-helper"></i></label>
    </div>
    <div class="form-group">
        <label for="categories">Categories</label>
        <select name="categories[]" id="categories" class="js-categories-select w-100" multiple>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->title }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="technologies">Technologies</label>
        <select name="technologies[]" id="technologies" class="js-technologies-select w-100" multiple>
            @foreach ($technologies as $technology)
                <option value="{{ $technology->id }}">{{ $technology->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>File upload</label>
        <div class="owl-carousel gallery">
            @foreach ($project->images as $image)
                <div class="item"><img src="{{ asset($image->url) }}" /></div>
            @endforeach
        </div>
        <input accept="image/*" type="file" name="image[]" class="file-upload-default" multiple>
        <div class="input-group col-xs-12">
            <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
            <span class="input-group-append">
                <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
            </span>
        </div>
    </div>
    <div class="form-group">
        <label for="about">About</label>
        <textarea class="form-control" name="about" id="about" rows="4">{{ $project->about }}</textarea>
    </div>
    <div class="form-group">
        <label for="contributions">Contributions</label>
        <textarea class="form-control" name="contributions" id="contributions" rows="4">{{ $project->contributions }}</textarea>
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
                $(".js-categories-select").select2();
                $(".js-categories-select").val(@json($project->categories->pluck('id')));
                $(".js-categories-select").trigger('change');

                $(".js-technologies-select").select2();
                $(".js-technologies-select").val(@json($project->technologies->pluck('id')));
                $(".js-technologies-select").trigger('change');

                //WYSISYG Editor
                tinymce.init({
                    selector: 'textarea#contributions', // Replace this CSS selector to match the placeholder element for TinyMCE
                    plugins: 'code',
                    height: 200,
                });
                tinymce.init({
                    selector: 'textarea#about', // Replace this CSS selector to match the placeholder element for TinyMCE
                    plugins: 'code',
                    height: 200,
                });
            })(jQuery);
        </script>
    </x-slot>
</x-crud.edit>
