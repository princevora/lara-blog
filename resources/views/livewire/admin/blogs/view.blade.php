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
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Title</th>
                            <th>Created On</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($blogs as $index => $blog )
                        <tr>
                            <td> {{++$index}} </td>
                            <td> {{ $blog->title }} </td>
                            <td> {{ $blog->created_at->diffForHumans() }} </td>
                            <td>
                                <center>
                                    <a href="{{ route('admin.blogs.edit', $blog->id) }}" wire:navigate class="mr-2 text-decoration-none">
                                        <i class=" fa fa-edit"></i>
                                    </a>
                                    <a href="" class="mr-2 text-decoration-none">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="" class="mr-2 text-decoration-none">
                                        <i class="fa fa-trash text-danger"></i>
                                    </a>
                                </center>
                            </td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
