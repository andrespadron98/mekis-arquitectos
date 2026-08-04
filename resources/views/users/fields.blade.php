<!-- Name Field -->
<div class="form-group col-sm-6">
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" value="{{ old('name', $user->name ?? '') }}" class="form-control">
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    <label for="email">Email:</label>
    <input type="text" name="email" id="email" value="{{ old('email', $user->email ?? '') }}" class="form-control">
</div>

<!-- Password Field -->
<div class="form-group col-sm-6">
    <label for="password">Password:</label>
    <input type="password" name="password" id="password" class="form-control">
</div>

<!-- Confirmation Password Field -->
<div class="form-group col-sm-6">
    <label for="password">Password Confirmation</label>
    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    <input type="submit" value="Save" class="btn btn-primary">
    <a href="{{ route('users.index') }}" class="btn btn-light">Cancel</a>
</div>
