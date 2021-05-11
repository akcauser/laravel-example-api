<div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
    <div class="col-sm-12 col-md-7">
        <input type="text" class="form-control" name="title" value="{{ isset($blog) ? $blog->title : old('title') }}">
    </div>
</div>
<div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Body</label>
    <div class="col-sm-12 col-md-7">
        <textarea name="body" class="summernote-simple">
            {{ isset($blog) ? $blog->body : old('body') }}
        </textarea>
    </div>
</div>