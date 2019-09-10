<?php

namespace App\Repositories\Eloquents;

use App\Comment;
use App\Contracts\CommentRepositoryInterface;
use App\Repositories\Eloquents\ElequentRepository;

class CommentRepository extends ElequentRepository implements CommentRepositoryInterface
{
    public function getModel()
    {
        return Comment::class;
    }

}
