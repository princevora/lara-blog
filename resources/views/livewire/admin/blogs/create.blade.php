<div class="row">
    <div class="col-lg-6">

        <!-- Dropdown Card Example -->
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Add Blog Details Below.</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <form>
                    <div class="mb-3">
                        <label for="title" class="form-label">Blog Title</label>
                        <input type="text" wire:model.lazy='title' class="form-control" id="title">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
