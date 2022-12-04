<x-crud.edit :id="$category->id">
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" placeholder="Title" name="title" id="title"
            value="{{ $category->title }}">
    </div>
</x-crud.edit>
