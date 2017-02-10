<?php

namespace Projacked\Http\Controllers;

use Projacked\Models\QuotationText;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class QuotationTextController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get()
    {
        return new JsonResponse(\Projacked\Models\QuotationText::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \Projacked\QuotationText  $quotationText
     * @return \Illuminate\Http\Response
     */
    public function show(QuotationText $quotationText)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Projacked\QuotationText  $quotationText
     * @return \Illuminate\Http\Response
     */
    public function edit(QuotationText $quotationText)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Projacked\QuotationText  $quotationText
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QuotationText $text)
    {
        $text->update($request->all());
        return new JsonResponse($text);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Projacked\QuotationText  $quotationText
     * @return \Illuminate\Http\Response
     */
    public function destroy(QuotationText $quotationText)
    {
        //
    }
}
