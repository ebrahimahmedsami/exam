<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\Interfaces\BaseInterface;
use App\Repositories\Interfaces\RegisterInterface;
use App\Repositories\Repositories\BaseRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class Register extends BaseRepository
{
    private $registerRepository;

    public function __construct(RegisterInterface $registerRepository)
    {
        $this->registerRepository = $registerRepository;
    }

    public function register(Request $request){
       return $this->registerRepository->register($request);
    }

    public function login(Request $request)
    {
      return $this->registerRepository->login($request);
    }
}
