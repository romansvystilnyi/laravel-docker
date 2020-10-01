<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" role="tab" href="#maindata">Main data</a>
                    </li>
                </ul>
                <br>
                <div class="tab-content">
                    <div class="tab-pane active" id="maindata" role="tabpanel">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input name="name" value="{{ $user->name }}" id="name" type="text" class="form-control"
                                   minlength="3" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input name="email" value="{{ $user->email }}" id="email" type="text" class="form-control"
                                   required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
