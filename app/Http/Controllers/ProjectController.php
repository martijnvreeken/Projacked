<?php namespace Projacked\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Projacked\Models\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function get()
    {
        $projects = Project::orderBy('updated_at', 'desc')->paginate(\Config::get('projacked.items_per_page'));
        return new JsonResponse($projects);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $data = array_filter($request->all());
        $project = Project::create($data);
        return new JsonResponse($project, 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Project  $project
     * @return Response
     */
    public function update(Request $request, Project $project)
    {
        $project->update($request->all());
        return new JsonResponse($project);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Project  $project
     * @return Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return new JsonResponse();
    }
}
