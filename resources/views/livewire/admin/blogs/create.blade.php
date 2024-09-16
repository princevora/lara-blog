<div class="row">
    <div class="col-lg-8">

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

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <svg xmlns="http://www.w3.org/2000/svg" style="height: 18px" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                            </svg>
                        </span>
                        <input disabled wire:model.bind="slug" type="text" class="form-control"
                            placeholder="Slug Will Appear Here" aria-label="slug" aria-describedby="basic-addon1">
                        <div wire:target="title" class="d-flex justify-content-center align-items-center">
                            <div wire:loading  class="mx-2 spinner-border text-primary spinner-border-sm" role="status">
                            </div>
                        </div>

                    </div>

                    <div class="mb-3">
                        <textarea id="summernote"></textarea>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
