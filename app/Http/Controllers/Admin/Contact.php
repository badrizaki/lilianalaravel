<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class Contact extends BaseController
{
    protected $mainPage = 'contact'; // mainpage
    protected $page = 'contact'; // mainpage
    protected $redirectTo = 'contact'; // REDIRECT URL
    protected $redirectIndex = 'contact.index'; // View
    protected $redirectEditable = 'contact.editable'; // vied add and update
    protected $redirectShow = 'contact.show'; // vied add and update

    protected function saveData(Request $request, $id)
    {
        // $data = [
        //     'title' => $request->title,
        //     'titleInd' => $request->titleInd,
        //     'content' => $request->content,
        //     'contentInd' => $request->contentInd,
        // ];
        // if ($request->Filedata)
        // {
        //     $image          = $request->Filedata;
        //     $imageName      = time().$image->getClientOriginalName();
        //     // $imageName      = md5($image->getClientOriginalName().time()).'.'.$image->getClientOriginalExtension();
        //     $destinationPath= $this->Config::get('app.directory.images');
        //     $result         = $image->move($destinationPath, $imageName);
        //     $imageUrl       = $destinationPath."/".$imageName;
        //     $data = $data + [
        //         "imageUrl" => $imageUrl
        //     ];
        // }
        // \App\Models\TextBank::where('key', 'contact')->update($data);

        // \App\Models\Setting::where('key', 'address')->update(['value' => $request->address]);
        // \App\Models\Setting::where('key', 'branchOffice')->update(['value' => $request->branchOffice]);
        \App\Models\Setting::where('key', 'contactEmail')->update(['value' => $request->contactEmail]);
        \App\Models\Setting::where('key', 'phoneNumber1')->update(['value' => $request->phoneNumber1]);
        // \App\Models\Setting::where('key', 'phoneNumber2')->update(['value' => $request->phoneNumber2]);
        \App\Models\Setting::where('key', 'facebook')->update(['value' => $request->facebook]);
        \App\Models\Setting::where('key', 'linkedin')->update(['value' => $request->linkedin]);
        \App\Models\Setting::where('key', 'instagram')->update(['value' => $request->instagram]);
        \App\Models\Setting::where('key', 'youtube')->update(['value' => $request->youtube]);
        \App\Models\Setting::where('key', 'tiktok')->update(['value' => $request->tiktok]);
        // \App\Models\Setting::where('key', 'fax')->update(['value' => $request->fax]);
        // \App\Models\Setting::where('key', 'fax2')->update(['value' => $request->fax2]);
        // \App\Models\Setting::where('key', 'whatsApp')->update(['value' => $request->whatsApp]);
        // \App\Models\Setting::where('key', 'maps')->update(['value' => $request->maps]);
    }
}