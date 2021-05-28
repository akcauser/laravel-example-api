<?php

namespace App\Cruder\Service\Concrete;

use App\Cruder\DataService\Abstract\ITagDataService;
use App\Cruder\Service\Abstract\ITagService;

class TagService implements ITagService
{
    private ITagDataService $tagDataService;

    public function __construct(ITagDataService $tagDataService)
    {
        $this->tagDataService = $tagDataService;
    }

    public function get($id)
    {
        $tag = $this->tagDataService->get($id);
        if (!$tag) {
            return 404;
        }

        return $tag;
    }

    public function get_all()
    {
        if (request('search')) {
            return $this->tagDataService->filter(request('search'));
        } else {
            return $this->tagDataService->get_all();
        }
    }

    public function store($request)
    {
        $response = $this->tagDataService->store($request->all());
        if (!$response) {
            return 500;
        }

        return $response;
    }

    public function update($request, $id)
    {
        $tag = $this->tagDataService->get($id);
        if (!$tag) {
            return 404;
        }

        $response = $this->tagDataService->update($tag, $request->all());
        if (!$response) {
            return 500;
        }

        return $response;
    }

    public function delete($id)
    {
        $tag = $this->tagDataService->get($id);
        if (!$tag) {
            return 404;
        }

        $response = $this->tagDataService->delete($tag);
        if (!$response) {
            return 500;
        }

        return $response;
    }
}
