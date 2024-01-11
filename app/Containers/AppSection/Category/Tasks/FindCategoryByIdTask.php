<?php

namespace App\Containers\AppSection\Category\Tasks;

use App\Containers\AppSection\Category\Data\Repositories\CategoryRepository;
use App\Containers\AppSection\Category\Models\Category;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindCategoryByIdTask extends ParentTask
{
    public function __construct(
        protected CategoryRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): Category
    {
        try {
            return $this->repository->find($id);
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
