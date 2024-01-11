<?php

namespace App\Containers\AppSection\Article\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Article\Models\Article;
use App\Containers\AppSection\Article\Tasks\UpdateArticleTask;
use App\Containers\AppSection\Article\UI\API\Requests\UpdateArticleRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateArticleAction extends ParentAction
{
    /**
     * @param UpdateArticleRequest $request
     * @return Article
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateArticleRequest $request): Article
    {
        $data = $request->sanitizeInput([
            'title',
            'content',
        ]);

        return app(UpdateArticleTask::class)->run($data, $request->id);
    }
}
