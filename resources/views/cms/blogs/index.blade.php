@extends('cms.layouts.app')

@section('page_scripts')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
    integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
<script src="{{asset('stisla')}}/js/page/components-table.js"></script>

<script>
    var deleteItem = function (id) {
        var url = "{{ route('cms.blogs.destroy', ':id') }}";
        url = url.replace(':id', id);

        if (confirm("Do you want to delete really")) {
            $.ajax({
                url: url,
                type: 'DELETE',
                data: {
                    _token: "{!! csrf_token() !!}"
                },
                success: function (result) {
                    location.reload();
                }
            });
        }
    }
</script>
@endsection

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Blogs</h1>
            <a class="btn btn-primary float-right ml-3" href="{{ route('cms.blogs.create') }}">New</a>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Components</a></div>
                <div class="breadcrumb-item">Table</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Table</h4>
                            <div class="card-header-form">
                                <form>
                                    <div class="input-group">
                                        @if(request('search'))
                                        <div class="text-danger mr-1">
                                            <a class="btn btn-sm btn-danger" href="{{route('cms.blogs.index')}}">
                                                <i class="fas fa-times-circle"></i>
                                            </a>
                                        </div>
                                        @endif
                                        <input type="text" class="form-control" placeholder="Search" name="search"
                                            value="{{ request('search') }}">
                                        <div class="input-group-btn">
                                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                @include('cms.blogs.table')
                            </div>
                        </div>
                        <div class="card-footer">
                            {{ $blogs->links('cms.layouts.pagination') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection