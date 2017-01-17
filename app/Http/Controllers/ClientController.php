<?php

namespace Projacked\Http\Controllers;

use Projacked\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Projacked\Models\Client;

class ClientController extends Controller
{
    public function get() {
        $clients = Client::paginate(\Config::get('projacked.items_per_page'));
        return new JsonResponse($clients);
    }
    
    public function store(Request $request) {
        $client = Client::create($request->all());
        return new JsonResponse($client, 201);
    }
    
    public function update(Client $client, Request $request) {
        $client->update($request->all());
        return new JsonResponse($client);
    }
    
    public function destroy(Client $client) {
        $client->delete();
        return new JsonResponse();
    }
}
