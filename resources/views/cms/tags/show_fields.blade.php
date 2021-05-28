<a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
    <div class="d-flex w-100 justify-content-between">
        <h5 class="mb-1">id:</h5>
        <small>integer</small>
    </div>
    <p class="mb-1">{{ $tag->id }}</p>
</a>
<a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
    <div class="d-flex w-100 justify-content-between">
        <h5 class="mb-1">title:</h5>
        <small>string</small>
    </div>
    <p class="mb-1">{{ $tag->title }}</p>
</a>
<a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
    <div class="d-flex w-100 justify-content-between">
        <h5 class="mb-1">created at:</h5>
        <small>timestamp</small>
    </div>
    <p class="mb-1">{{ $tag->created_at }}</p>
</a>
<a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
    <div class="d-flex w-100 justify-content-between">
        <h5 class="mb-1">updated at:</h5>
        <small>timestamp</small>
    </div>
    <p class="mb-1">{{ $tag->updated_at }}</p>
</a>