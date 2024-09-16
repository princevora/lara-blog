<div class="row">
    <div class="col-lg-9">

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

                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug</label>
                        <input wire:model.bind="slug" type="text" class="form-control"
                            placeholder="Slug Will Appear Here" aria-label="slug" id="slug" aria-describedby="basic-addon1">
                        <div wire:target="title" class="d-flex justify-content-center align-items-center">
                            <div wire:loading  class="mx-2 spinner-border text-primary spinner-border-sm" role="status">
                            </div>
                        </div>

                    </div>

                    <div class="mb-3" >
                        <textarea id="summernote"></textarea>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
