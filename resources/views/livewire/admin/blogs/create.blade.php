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
                        <input wire:model.lazy="slug" type="text" class="form-control"
                            placeholder="Slug Will Appear Here" aria-label="slug" id="slug" aria-describedby="basic-addon1">
                        <div wire:target="title" class="d-flex justify-content-center align-items-center">
                            <div wire:loading  class="mx-2 spinner-border text-primary spinner-border-sm" role="status">
                            </div>
                        </div>

                        <small class="d-flex gap-2 mt-2">
                            @if (!empty($slug) && $slugAvailability)
                                <span class="text-success">
                                    <svg style="height: 18px" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                                    </svg>
                                    The slug is available
                                </span>
                            @elseif(!empty($slug) && !$slugAvailability)
                                <span class="text-danger">
                                    <svg style="height: 18px" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                    </svg>
                                    The slug is Not available
                                </span>
                            @endif
                        </small>

                    </div>

                    <div class="mb-3" wire:ignore>
                        <textarea id="summernote" name="blog_html"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label">Meta Description</label>
                        <input type="text" wire:model.lazy='title' class="form-control" id="title">
                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label">Meta Keywords</label>
                        <input type="text" wire:model.lazy='title' class="form-control" id="title">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
