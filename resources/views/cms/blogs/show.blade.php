@extends('cms.layouts.app')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Blog Detail #{{ $blog->id }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Bootstrap Components</a></div>
                <div class="breadcrumb-item">List Group</div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Fields</h4>
                        </div>
                        <div class="card-body">
                            <div class="list-group">
                                <a href="#"
                                    class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">id:</h5>
                                        <small>integer</small>
                                    </div>
                                    <p class="mb-1">{{ $blog->id }}</p>
                                </a>
                                <a href="#"
                                    class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">title:</h5>
                                        <small>string</small>
                                    </div>
                                    <p class="mb-1">{{ $blog->title }}</p>
                                </a>
                                <a href="#"
                                    class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">body:</h5>
                                        <small>text</small>
                                    </div>
                                    <p class="mb-1">{{ $blog->body }}</p>
                                </a>
                                <a href="#"
                                    class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">created at:</h5>
                                        <small>timestamp</small>
                                    </div>
                                    <p class="mb-1">{{ $blog->created_at }}</p>
                                </a>
                                <a href="#"
                                    class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">updated at:</h5>
                                        <small>timestamp</small>
                                    </div>
                                    <p class="mb-1">{{ $blog->updated_at }}</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection