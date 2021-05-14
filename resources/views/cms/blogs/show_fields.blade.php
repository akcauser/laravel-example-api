<a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
    <div class="d-flex w-100 justify-content-between">
        <h5 class="mb-1">id:</h5>
        <small>integer</small>
    </div>
    <p class="mb-1">{{ $blog->id }}</p>
</a>
<a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
    <div class="d-flex w-100 justify-content-between">
        <h5 class="mb-1">title:</h5>
        <small>string</small>
    </div>
    <p class="mb-1">{{ $blog->title }}</p>
</a>
<a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
    <div class="d-flex w-100 justify-content-between">
        <h5 class="mb-1">body:</h5>
        <small>text</small>
    </div>
    <p class="mb-1">{{ $blog->body }}</p>
</a>
<a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
    <div class="d-flex w-100 justify-content-between">
        <h5 class="mb-1">created at:</h5>
        <small>timestamp</small>
    </div>
    <p class="mb-1">{{ $blog->created_at }}</p>
</a>
<a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
    <div class="d-flex w-100 justify-content-between">
        <h5 class="mb-1">updated at:</h5>
        <small>timestamp</small>
    </div>
    <p class="mb-1">{{ $blog->updated_at }}</p>
</a>