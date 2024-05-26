<x-app-layout>
    

    <div class="pagetitle">
        <h1>{{ __('Post') }}</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">{{ __('Dashboard') }}</a></li>
            <li class="breadcrumb-item active">{{ __('Resource') }}</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->
  
      <section class="section">
        <div class="row">
          <div class="col-lg-12">
            <div class="card p-5">
              <div class="card-body">
                <div class="text-end">
                  <a href="{{ route('post.create')}}" class="btn btn-primary mb-3"><i class="bi bi-file-earmark-plus-fill m-1"></i> Add New Post</a>
                  <hr class my-5 >
                </div>
                <table class="table datatable">
                  <thead>
                    <tr>
                      <th>Subjects</th>
                      <th>Posts</th>
                      <th>Status</th>
                      <th>Created</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @isset($posts)
                      @foreach ($posts as $post)
                        <tr>
                          <td>{{ $post->subject }}</td>
                          <td>{{ $post->post }}</td>
                          <td>{{ $post->status }}</td>
                          <td>{{ $post->created_at }}</td>
                          <td>
                            <a href="{{ route('post.show', $post->id)}}" class="btn btn-primary btn-sm m-1" ><i class="bi bi-eye-fill"></i></a>
                            <a href="{{ route('post.edit', $post->id)}}" class="btn btn-success btn-sm m-1"><i class="bi bi-pencil-square"></i></a>
                            <!-- Delete Post Form -->
                            <form id="delete-post-form" action="{{ route('post.destroy', $post) }}" method="post">
                              @csrf
                              @method('delete')
                              <button type="button" class="btn btn-danger btn-sm m-1" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">
                                  <i class="bi bi-trash2-fill"></i>
                              </button>
                            </form>

                            <!-- Confirmation Modal -->
                            <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Deletion</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                          Are you sure you want to delete this post?
                                      </div>
                                      <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                          <button type="button" class="btn btn-danger" id="confirmDeleteButton">Delete</button>
                                      </div>
                                  </div>
                              </div>
                            </div>
                            <!-- JavaScript to handle the modal confirmation -->
                            <script>
                              document.getElementById('confirmDeleteButton').addEventListener('click', function() {
                                  document.getElementById('delete-post-form').submit();
                              });
                            </script>
                          </td>
                        </tr>
                      @endforeach
                    @endisset
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </section>
</x-app-layout>