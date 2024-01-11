<?php

namespace App\Containers\AppSection\Article\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Article\Models\Article;
use App\Containers\AppSection\Article\Tasks\CreateArticleTask;
use App\Containers\AppSection\Article\UI\API\Requests\CreateArticleRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateArticleAction extends ParentAction
{
    /**
     * @param CreateArticleRequest $request
     * @return Article
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateArticleRequest $request): Article
    {
        $data = $request->sanitizeInput([
            'title',
            'content',
        ]);

        return app(CreateArticleTask::class)->run($data);
    }
}
