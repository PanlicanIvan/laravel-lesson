<x-app-layout>
    <div class="pagetitle">
        <h1>{{ __('Post') }}</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">{{ __('Dashboard') }}</a></li>
            <li class="breadcrumb-item active">{{ __('Resource') }}</li>
            <li class="breadcrumb-item"><a href="{{ route('post.index')}}">{{ __('Add New Post') }}</a></li>
          </ol>
        </nav>
      </div><!-- End Page Title -->
  
      <section class="section">
        <div class="row">
          <div class="col-lg-12">
            @if(session()->has('message'))
                <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card p-5">
              <div class="card-body">
                <h4>Add New Post</h4>
                <form action="{{ route('post.update', $post )}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="col-sm-12">
                        <div class="form-floating mb-3">
                          <input type="text" class="form-control @error('subject') is-invalid @enderror" 
                            name="subject" id="subject" placeholder="Subject" value="{{ $post->subject}}"> 
                          <label for="floatingInput">Subject</label>
                          @error('subject')
                              <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                        <div class="form-floating mb-3">
                          <textarea class="form-control" placeholder="Post" name="post" style="height: 100px;">{{ $post->post}}</textarea>
                          <label for="floatingTextarea">Post</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="status" {{ ($post->status ==1 ? 'checked' : '')}}>
                            <label class="form-check-label" for="flexSwitchCheckDefault">Post Status</label>
                        </div>
                        <div class="w-100 mt-5">
                            <button type="submit" class="btn btn-primary"> Save Post</button>
                        </div>
                      </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
</x-app-layout>