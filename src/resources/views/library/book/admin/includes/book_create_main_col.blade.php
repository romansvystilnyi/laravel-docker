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
                            <label for="title">Title</label>
                            <input name="title" id="title" type="text" class="form-control" minlength="1" required>
                        </div>
                        <div class="form-group">
                            <label for="slug">slug</label>
                            <input name="slug" id="slug" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="genre">Genre</label>
                            <select name="genre" class="form-control" id="genre" required>
                                @foreach($genres as $genre)
                                    <option value="{{$i++}}">
                                        {{$genre}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="author">Author</label>
                            <input name="author" id="author" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control" id="description" rows="4"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Upload image</label>
                            <input name="image" type="file" class="form-control-file" id="image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
