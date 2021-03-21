<?php

namespace App\Http\Controllers;

use App\Repositories\Abstract\IBlogRepository;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    protected IBlogRepository $blogRepository;

    public function __construct(IBlogRepository $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }

    public function list()
    {   
        $blogs = $this->blogRepository->get_all();
        
        return response()->json($blogs, 200);
    }

    public function create_form()
    {
        // Create Form Here
    }

    public function create(Request $request)
    {
        // store data

        // response list page or detail page
    }

    public function update_form($id)
    {
        // find data

        // update form open
    }

    public function update($id)
    {
        // update data

        // update form open
    }

    public function delete($id)
    {
        // delete data

        // list page open 
    }

}
