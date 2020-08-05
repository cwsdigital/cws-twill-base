<?php


namespace App\Http\Controllers;


use App\Mail\EnquiryMailer;
use App\Models\Enquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class EnquiryController extends Controller {

    public function store(Request $request) {

        $validator = Validator::make($request->all(), [
            'name' => ['required'],
            'email' => ['email', 'required'],
            'message' => ['required'],
            'privacy_policy' => ['accepted'],
        ]);

        if ($validator->fails()) {
            return redirect()
                ->to(url()->previous() . '#contact')
                ->withErrors($validator, 'contactForm')
                ->withInput();
        }

        $enquiry = Enquiry::create($request->all());

        Mail::to(config('enquiries.to'))->send( new EnquiryMailer($enquiry));

        return redirect()
            ->to(url()->previous() . '?status=sent#contact');

    }

}
