<?php

namespace App\Repositories;

use App\Interfaces\PublisherRepositoryInterface;
use App\Models\Publisher;

class EloquentPublisherRepository implements PublisherRepositoryInterface
{
    public function getAllPublishers(){
        return Publisher::all();
    }
    public function getPublisherById(int $publisherId): ?Publisher{
        return Publisher::find($publisherId);
    }
    public function deletePublisher(int $publisherId): void{
        Publisher::destroy($publisherId);
    }
    public function createPublisher(array $publishersDetails): Publisher{
        return Publisher::create($publishersDetails);
    }
    public function updatePublisher(int $publisherId, array $newDetails):Publisher{
        $publisher = Publisher::findOrFail($publisherId);
        $publisher->update($newDetails);
        return $publisher;
    }   
}
