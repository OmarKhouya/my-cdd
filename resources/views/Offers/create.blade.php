@if ($errors->has('status'))
    @foreach ($errors->all() as $err)
        <<div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{-- <strong>Error!</strong>  --}}{{ $error }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
    @endforeach
@endif
<form action="{{ route('partner.offers.store') }}" method="POST" enctype="multipart/form-data" id="offerForm"
    class="mx-auto">
    @csrf
    <div class="my-3">
        <label for="title" class="input-label">Title</label>
        <input type="text" class="form-control" name="title" autofocus required>
    </div>
    <div class="my-3">
        <label for="description" class="input-label">Description</label>
        <textarea type="text" class="form-control" name="description" required></textarea>
    </div>
    <div class="row">
        <div class="col-md-6 my-3">
            <label for="category" class="input-label">Category</label>
            <input type="text" class="form-control" name="category" required>
        </div>
        <div class="col-md-6 m-auto">
            <label for="availability" class="input-label">Is available</label>
            <input type="checkbox" class="form-check-input" name="availability" required>
        </div>
    </div>
    <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-primary mt-3">Create</button>
    </div>
</form>
