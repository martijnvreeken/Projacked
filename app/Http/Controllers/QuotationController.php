<?php

namespace Projacked\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Projacked\Models\Lead;
use Projacked\Models\QuotationText;
use Projacked\PdfDocument;

class QuotationController extends Controller
{
    public function create(Request $request) {
        $lead = Lead::findOrFail($request->get('id'));
        $texts = QuotationText::all();
        $path = app(\Projacked\Repositories\QuotationRepository::class)->fromLead($lead, $texts);
        return new JsonResponse(compact('path'));
    }
}
