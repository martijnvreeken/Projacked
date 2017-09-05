<?php
namespace Projacked\Http\Controllers;

use Illuminate;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Projacked\Http\Requests\LeadStore;
use Projacked\Models\Lead;
use Projacked\Repositories\ProjectRepository;
use Symfony\Component\DomCrawler\Form;
use function app;

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

    /**
    * creates a new project based on a lead
    *
    * @param Illuminate\Http\Request $request
    *
    * @return Illuminate\Http\JsonResponse
    */
    public function promote(Request $request) {
        $lead = Lead::findOrFail($request->get('id'));
        $project_repository = app(ProjectRepository::class);
        $project = $project_repository->fromLead($lead);
        $lead->delete();
        return new JsonResponse($project, 201);
    }

    /**
    * creates a new lead from the public form
    *
    * @param Projacked\Http\Requests\LeadStore $request
    *
    * @return Illuminate\View\View
    */
    public function create(LeadStore $request) {
        $data = array_filter($request->all());
        $lead = Lead::create($data);
        return view('pages.confirm');
    }
}
