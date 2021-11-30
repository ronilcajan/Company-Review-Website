<!-- Modal -->
<div class="modal fade" id="addCat" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg-black">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="msg"></div>
                <form method="POST" action="<?= site_url('category/create') ?>" id="category_form">
                    <div class="form-group form-floating-label">
                        <label>Category Name</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group form-floating-label">
                        <label>Description</label>
                        <textarea class="form-control" name="description"></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="editCat" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg-black">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="msg"></div>
                <form method="POST" action="<?= site_url('category/update') ?>">
                    <div class="form-group form-floating-label">
                        <label>Category Name</label>
                        <input type="text" class="form-control" name="name" required id="cname" readonly>
                    </div>
                    <div class="form-group form-floating-label">
                        <label>Description</label>
                        <textarea class="form-control" name="description" id="desc"></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id" id="cat_id">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
            </form>
        </div>
    </div>
</div>