<x-crud.edit :id="$technology->id">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" placeholder="Name" name="name" id="name"
            value="{{ $technology->name }}">
    </div>
</x-crud.edit>
