<?php namespace Projacked\Repositories;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Collection;
use Projacked\Jobs\QuotationFromLead;
use Projacked\Models\Lead;
use Projacked\PdfDocument;

/**
 * Description of QuotationRepository
 *
 * @author martijn
 */
class QuotationRepository {
    use DispatchesJobs;

    public function fromLead(Lead $lead, Collection $texts) {
        $this->dispatch(new QuotationFromLead($lead, $texts, app(PdfDocument::class)));
    }
}
