<table class="table table-responsive">
    <thead>
        <tr>
            <th>Title</th>
            <th>Body</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($blogs as $blog)
        <tr>
            <td>{{ $blog->title }}</td>
            <td>{{ $blog->body }}</td>
            <td>
                <form action="{{ route('cms.blogs.destroy',$blog->id) }}" method="POST">
                @csrf()
                @method("DELETE")
    
                <div class='btn-group'>
                    <a href="{{ route('cms.blogs.show', [$blog->id]) }}" class='btn btn-default btn-xs'>
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="{{ route('cms.blogs.edit', [$blog->id]) }}" class='btn btn-default btn-xs'>
                        <i class="fas fa-edit"></i>
                    </a>
                    <a type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                        <i class="fas fa-trash"></i>
                    </a>
                    
                </div>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>