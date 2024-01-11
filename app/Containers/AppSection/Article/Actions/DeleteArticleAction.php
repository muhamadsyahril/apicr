<?php

namespace App\Containers\AppSection\Article\Actions;

use App\Containers\AppSection\Article\Tasks\DeleteArticleTask;
use App\Containers\AppSection\Article\UI\API\Requests\DeleteArticleRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteArticleAction extends ParentAction
{
    /**
     * @param DeleteArticleRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteArticleRequest $request): int
    {
        return app(DeleteArticleTask::class)->run($request->id);
    }
}
