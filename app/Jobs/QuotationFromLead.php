<?php

namespace Projacked\Jobs;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;
use Projacked\Models\Lead;
use Projacked\PdfDocument;


class QuotationFromLead implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;
    
    protected $lead;
    protected $texts;
    protected $pdf;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Lead $lead, Collection $texts, PdfDocument $pdf)
    {
        $this->lead = $lead;
        $this->texts = $texts;
        $this->pdf = $pdf;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $html = view('quotation.main', ['lead' => $this->lead, 'texts' => $this->texts]);
        $this->pdf->setContent($html);
        $filename = Carbon::now()->format('d-m-Y') . '-Offerte-' . urlencode($this->lead->client) . '.pdf';
        $this->pdf->save($filename);
        $this->lead->quotation_uri = '/storage/' . $filename;
        $this->lead->notify(new \Projacked\Notifications\QuotationCreated());
    }
}
