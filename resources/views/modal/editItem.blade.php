<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Card</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" class="postForm" action="api/card/{{$data["id"]}}">
                <div class="modal-body">
                    {{csrf_field()}}
                    {{method_field("PUT")}}
                    <div class="mb-3">
                        <label for="title" class="col-form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{$data["title"]}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="content" class="col-form-label">Content:</label>
                        <textarea rows="5" class="form-control" id="content" name="content" required>{{$data["content"]}}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
