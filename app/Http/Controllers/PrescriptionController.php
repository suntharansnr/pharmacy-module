<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    public function createPrescription(){
        return view('pages.user.prescription');
    }

    public function getQuotations(){
        return view('pages.user.quotations');
    }

    public function viewQuotation($quotation_id){
        return view('pages.user.viewquotations',compact('quotation_id'));
    }

    public function getPrescriptions(){
        return view('pages.pharmacy.prescriptions');
    }

    public function createQuotation($prescription_id){
        return view('pages.pharmacy.createquotation',compact('prescription_id'));
    }
}
