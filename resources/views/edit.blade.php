<div class="">
    <div class="form-group">
        <input type="text" name="name" value="{{ $data->name }}"  id="name" class="form-control" placeholder="Name Product" />
    </div>
    <div class="form-group">
        <button class="btn btn-warning mt-2" onclick="update({{ $data->id }})">Update</button>
    </div>
</div>