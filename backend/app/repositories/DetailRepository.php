<?php
namespace App\Repositories;

use App\Models\Transaction;
use App\Models\Detail;

class DetailRepository 
{
    protected $model;

    public function __construct(Detail $model)
    {
        $this->model = $model;
    }
}