@extends('cms.layouts.app')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tag Detail #{{ $tag->id }}</h1>
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
                                @include('cms.tags.show_fields')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection