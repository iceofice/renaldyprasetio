<x-crud.edit>
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" placeholder="Name" name="name" id="name" disabled
            value="{{ $contact->name }}">
    </div>
    <div class="form-group">
        <label for="name">Email</label>
        <input type="text" class="form-control" placeholder="Name" name="name" id="name" disabled
            value="{{ $contact->email }}">
    </div>
    <div class="form-group">
        <label for="name">Subject</label>
        <input type="text" class="form-control" placeholder="Name" name="name" id="name" disabled
            value="{{ $contact->subject }}">
    </div>
    <div class="form-group">
        <label for="name">Message</label>
        <textarea name="" id="" cols="30" rows="10" class="form-control" disabled>{{ $contact->message }}</textarea>
    </div>
</x-crud.edit>
