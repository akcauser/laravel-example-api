<div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
    <div class="col-sm-12 col-md-7">
        <input type="text" class="form-control" name="title" value="{{ isset($tag) ? $tag->title : old('title') }}">
    </div>
</div>
<div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Blog</label>
    <div class="col-sm-12 col-md-7">
        <select class="form-control" name="blog_id">
            @foreach($blogs as $blog)
                <option {{ isset($tag) && $blog->id == $tag->blog_id ? "selected" : "" }} value="{{ $blog->id }}">{{ $blog->title }}</option>
            @endforeach
        </select>
    </div>
</div>