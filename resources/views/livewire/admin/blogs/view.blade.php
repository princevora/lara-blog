<div class="row">
    <div class="col-12">

        <!-- Dropdown Card Example -->
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Available Blogs ({{ $blogs->count() }})</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <livewire:blog-table />
            </div>
        </div>
    </div>
</div>
