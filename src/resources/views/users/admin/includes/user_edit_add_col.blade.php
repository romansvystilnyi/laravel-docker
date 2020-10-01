<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
<br>
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <ul class="list-unstyled">
                    <li>ID: {{ $user->id }}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<br>
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Email verified</label>
                    <input type="text" value="{{ $user->email_verified_at }}" disabled>
                </div>
                <div class="form-group">
                    <label for="title">Created</label>
                    <input type="text" value="{{ $user->created_at }}" disabled>
                </div>
                <div class="form-group">
                    <label for="title">Updated</label>
                    <input type="text" value="{{ $user->updated_at }}" disabled>
                </div>
            </div>
        </div>
    </div>
</div>
