<div class="p-2">
    <div class="form-group">
        <input type="text" name="name" id="name" class="form-control" value="{{ $data->name }}" placeholder="name product">
    </div>
    <div class="form-group">
        <button class="btn btn-warning mt-2" onClick="update({{ $data->id }})">Edit</button>
    </div>
</div>