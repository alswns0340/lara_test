<?php

namespace App\Http\Controllers;

use App\Interfaces\PublisherRepositoryInterface;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    protected PublisherRepositoryInterface $publisherRepository;

    public function __construct(PublisherRepositoryInterface $publisherRepository)
    {
        $this->publisherRepository = $publisherRepository;
    }
    
    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable|string',
        ]);

        $publisher=$this->publisherRepository->createPublisher($request->all());
        return response()->json($publisher,201);
    }
}