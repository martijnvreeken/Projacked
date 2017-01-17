<?php

namespace Projacked\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Projacked\Http\Requests\LeadStore;
use Projacked\Models\Lead;

class LeadController extends Controller
{
    public function get() {
        $leads = Lead::orderBy('updated_at', 'desc')->paginate(\Config::get('projacked.items_per_page'));
        return new JsonResponse($leads);
    }
    
    public function store(LeadStore $request) {
        $data = array_filter($request->all());
        $lead = Lead::create($data);
        return new JsonResponse($lead, 201);
    }
    
    public function update(Lead $lead, Request $request) {
        $lead->update($request->all());
        return new JsonResponse($lead);
    }
    
    public function destroy(Lead $lead) {
        $lead->delete();
        return new JsonResponse();
    }
}
