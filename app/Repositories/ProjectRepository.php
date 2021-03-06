<?php
namespace Projacked\Repositories;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Projacked\Models\Client;
use Projacked\Models\Lead;
use Projacked\Models\Project;

/**
 * Description of ProjectRepository
 *
 * @author martijn
 */
class ProjectRepository {
    /**
     * creates a project from a lead
     *
     * @param Projacked\Models\Lead $lead
     *
     * @return Projacked\Models\Project
     */
    public function fromLead(Lead $lead) {
        // check if $lead->client_email exists in clients table
        try {
            $client = Client::where('email', $lead->client_email)->firstOrFail();
        } catch (ModelNotFoundException $exc) {
            $client = \app(ClientRepository::class)->fromLead($lead);
        }

        // create new project
        // link to client
        $project = $client->projects()->create([
            'description' => $lead->description,
            'proposal' => $lead->proposal,
            'fixed_price' => $lead->fixed_price,
            'hour_rate' => $lead->hour_rate,
            'hour_estimate' => $lead->hour_estimate
        ]);
        // return new project
        return $project;
    }
}
