<?php
namespace Projacked\Http\Controllers;

use Illuminate;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Projacked\Models\Lead;
use Projacked\Models\QuotationText;
use Projacked\PdfDocument;
use Projacked\Repositories\QuotationRepository;

class QuotationController extends Controller
{
    /**
    * Generate a pdf quotation off a lead
    *
    * @param Illuminate\Http\Request $request
    *
    * @return Illuminate\Http\JsonResponse
    */
    public function create(Request $request) {
        $lead = Lead::findOrFail($request->get('id'));
        $texts = QuotationText::all();
        $path = app(QuotationRepository::class)->fromLead($lead, $texts);
        return new JsonResponse(compact('path'));
    }
}
