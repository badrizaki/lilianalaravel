<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use PDF;

class Home extends BaseController
{
    protected $mainPage = 'home'; // mainpage
    protected $page = 'home'; // mainpage
    protected $redirectTo = ''; // REDIRECT URL
    protected $redirectIndex = 'home.home'; // View home
    protected $redirectEditable = 'home.editable'; // vied add and update
    protected $redirectShow = 'home.show'; // vied add and update

    public function index()
    {
        $list = [];
        return $this->view('admin.home.home', compact('list'));
    }

    protected function saveData(Request $request, $id)
    {
        $data = [
            'titleInd' => $request->titleInd,
            'content' => $request->content,
            'contentInd' => $request->contentInd,
            'content2Ind' => $request->content2Ind,
        ];
        if ($request->Filedata) {
            $image = $request->Filedata;
            $imageName = time() . $image->getClientOriginalName();
            // $imageName      = md5($image->getClientOriginalName().time()).'.'.$image->getClientOriginalExtension();
            $destinationPath = $this->Config::get('app.directory.images');
            $image->move($destinationPath, $imageName);
            $imageUrl = $destinationPath . "/" . $imageName;
            $data = $data + [
                "imageUrl" => $imageUrl
            ];
        }
        \App\Models\TextBank::where('key', 'topContent')->update($data);

        // $item = \App\Models\TextBank::where('key', 'welcome')->update([
        // 	'title' => $request->welcomeTitle,
        // 	'titleInd' => $request->welcomeTitleInd,
        // 	'content' => $request->welcomeContent,
        // 	'contentInd' => $request->welcomeContentInd,
        // ]);

        // // BANNER
        // $item = \App\Models\TextBank::where('key', 'bannerHome')->update([
        //     'content' => $request->bannerHomeContent,
        //     'contentInd' => $request->bannerHomeContentInd,
        // ]);
        // if ($request->FiledataBanner)
        // {
        //     $image          = $request->FiledataBanner;
        //     $imageName      = time().$image->getClientOriginalName();
        //     // $imageName      = md5($image->getClientOriginalName().time()).'.'.$image->getClientOriginalExtension();
        //     $destinationPath= $this->Config::get('app.directory.images');
        //     $result         = $image->move($destinationPath, $imageName);
        //     $imageUrl       = $destinationPath."/".$imageName;
        //     $data = $data + [
        //         "imageUrl" => $imageUrl
        //     ];
        //     $item = \App\Models\TextBank::where('key', 'bannerHome')->update($data);
        // } elseif ($request->deleteFiledataBanner == 'HAPUS') {
        //     $data = $data + [
        //         "imageUrl" => ""
        //     ];
        //     $item = \App\Models\TextBank::where('key', 'bannerHome')->update($data);
        // }

        // if ($request->FiledataBannerMoblie)
        // {
        //     $image          = $request->FiledataBannerMoblie;
        //     $imageName      = time().$image->getClientOriginalName();
        //     // $imageName      = md5($image->getClientOriginalName().time()).'.'.$image->getClientOriginalExtension();
        //     $destinationPath= $this->Config::get('app.directory.images');
        //     $result         = $image->move($destinationPath, $imageName);
        //     $content2       = $destinationPath."/".$imageName;
        //     $item = \App\Models\TextBank::where('key', 'bannerHome')->update([ "content2" => $content2 ]);
        // } elseif ($request->deleteFiledataBanner == 'HAPUS') {
        //     $item = \App\Models\TextBank::where('key', 'bannerHome')->update([ "content2" => "" ]);
        // }

        // if ($request->FiledataPopUp)
        // {
        //     $image          = $request->FiledataPopUp;
        //     $imageName      = time().$image->getClientOriginalName();
        //     // $imageName      = md5($image->getClientOriginalName().time()).'.'.$image->getClientOriginalExtension();
        //     $destinationPath= $this->Config::get('app.directory.images');
        //     $result         = $image->move($destinationPath, $imageName);
        //     $content       = $destinationPath."/".$imageName;
        //     $item = \App\Models\TextBank::where('key', 'popUp')->update([ "content" => $content ]);
        // } elseif ($request->deleteFiledataPopUp == 'HAPUS') {
        //     $item = \App\Models\TextBank::where('key', 'popUp')->update([ "content" => "" ]);
        // }
    }

    public function accessDenied()
    {
        $list = [];
        return $this->view('admin.home.accessdenied', compact('list'));
    }
}