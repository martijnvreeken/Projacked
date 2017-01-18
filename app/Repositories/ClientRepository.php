<?php namespace Projacked\Repositories;

use Projacked\Models\Client;
use Projacked\Models\Lead;

/**
 * Description of ClientRepository
 *
 * @author martijn
 */
class ClientRepository {
    public function fromLead(Lead $lead) {
        $data = [
            'name' => $lead->client_name,
            'email' => $lead->client_email
        ];
        if(preg_match('/^(\+31\s?6|06)[0-9\s]+/', $lead->client_phone)) {
            $data['mobilenumber'] = $lead->client_phone;
        } else {
            $data['phonenumber'] = $lead->client_phone;
        }
        return Client::create($data);
    }
}
