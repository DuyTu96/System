<form action="{{ route('admin.categories.store') }}" method="post">
    @csrf
    <div class="modal fade " id="modalCreateCategory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Create New Category</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="categoryParent">Example select</label>
                        <select class="form-control" id="categoryParent" name="parent_id">
                            <option value="0">Root</option>
                            @include('admin.partials.categories_options', ['level' => 0])
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="categoryName">Name</label>
                        <input type="text" class="form-control" id="categoryName" name="name" aria-describedby="emailHelp" placeholder="Enter Category Name">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                    <button class="btn btn-success" type="submit">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</form>
