<?php 

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Datatables;

class Address extends BaseController
{
    protected $mainPage = 'contact'; // mainpage
    protected $redirectTo = 'address'; // REDIRECT URL
    protected $redirectIndex = 'address.index'; // View address
    protected $redirectEditable = 'address.editable'; // vied add and update
    protected $redirectShow = 'address.show'; // vied add and update

    public function index()
    {
        $mainPage = $this->mainPage;
        $list = [];
        $item['address'] = \App\Models\Setting::where('key', 'address')->get()->first();
        $item['branchOffice'] = \App\Models\Setting::where('key', 'branchOffice')->get()->first();
        $item['phoneNumber1'] = \App\Models\Setting::where('key', 'phoneNumber1')->get()->first();
        $item['phoneNumber2'] = \App\Models\Setting::where('key', 'phoneNumber2')->get()->first();
        $item['fax'] = \App\Models\Setting::where('key', 'fax')->get()->first();
        $item['fax2'] = \App\Models\Setting::where('key', 'fax2')->get()->first();
        $item['emailInquiry'] = \App\Models\Setting::where('key', 'emailInquiry')->get()->first();
        $item['facebook'] = \App\Models\Setting::where('key', 'facebook')->get()->first();
        $item['linkedin'] = \App\Models\Setting::where('key', 'linkedin')->get()->first();
        $item['instagram'] = \App\Models\Setting::where('key', 'instagram')->get()->first();
        $item['whatsApp'] = \App\Models\Setting::where('key', 'whatsApp')->get()->first();
        $item['PTName'] = \App\Models\Setting::where('key', 'PTName')->get()->first();
        $item['copyright'] = \App\Models\Setting::where('key', 'copyright')->get()->first();
        $item['maps'] = \App\Models\Setting::where('key', 'maps')->get()->first();
        $item['contact'] = \App\Models\TextBank::where('key', 'contact')->get()->first();
        return view($this->redirectIndexPath(), compact('list', 'mainPage', 'item'));
    }

    protected function saveData(Request $request, $id)
    {
        $data = [
            'title' => $request->title,
            'titleInd' => $request->titleInd,
            'content' => $request->content,
            'contentInd' => $request->contentInd,
        ];
        if ($request->Filedata)
        {
            $image          = $request->Filedata;
            $imageName      = time().$image->getClientOriginalName();
            // $imageName      = md5($image->getClientOriginalName().time()).'.'.$image->getClientOriginalExtension();
            $destinationPath= $this->Config::get('app.directory.images');
            $result         = $image->move($destinationPath, $imageName);
            $imageUrl       = $destinationPath."/".$imageName;
            $data = $data + [
                "imageUrl" => $imageUrl
            ];
        }
        \App\Models\TextBank::where('key', 'contact')->update($data);

        \App\Models\Setting::where('key', 'address')->update(['value' => $request->address]);
        \App\Models\Setting::where('key', 'branchOffice')->update(['value' => $request->branchOffice]);
        \App\Models\Setting::where('key', 'phoneNumber1')->update(['value' => $request->phoneNumber1]);
        \App\Models\Setting::where('key', 'phoneNumber2')->update(['value' => $request->phoneNumber2]);
        \App\Models\Setting::where('key', 'fax')->update(['value' => $request->fax]);
        \App\Models\Setting::where('key', 'fax2')->update(['value' => $request->fax2]);
        \App\Models\Setting::where('key', 'emailInquiry')->update(['value' => $request->emailInquiry]);
        \App\Models\Setting::where('key', 'facebook')->update(['value' => $request->facebook]);
        \App\Models\Setting::where('key', 'linkedin')->update(['value' => $request->linkedin]);
        \App\Models\Setting::where('key', 'instagram')->update(['value' => $request->instagram]);
        \App\Models\Setting::where('key', 'whatsApp')->update(['value' => $request->whatsApp]);
        \App\Models\Setting::where('key', 'PTName')->update(['value' => $request->PTName]);
        \App\Models\Setting::where('key', 'copyright')->update(['value' => $request->copyright]);
        \App\Models\Setting::where('key', 'maps')->update(['value' => $request->maps]);
    }
}