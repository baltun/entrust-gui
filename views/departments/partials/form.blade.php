<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="form-group">
    <label for="name">Name</label>
    <input type="name" class="form-control" id="name" placeholder="Name" name="name" value="{{ (Session::has('errors')) ? old('name', '') : $department->name }}">
</div>


