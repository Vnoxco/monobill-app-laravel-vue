<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Monobill\MonobillPhpSdk\MonoBillAPI;

class InstallController extends Controller
{

    public function index(Request $request)
    {
        $api = new MonoBillAPI(config('monobill.id'), config('monobill.secret'));
        $api->setScopes(config('monobill.scopes'));
        $api->setCallbackUrl(url('/install/complete'));
        return redirect($api->getInstallURL());
    }

    public function complete(Request $request)
    {
        $api = new MonoBillAPI(config('monobill.id'), config('monobill.secret'));
        if ($api->validateInstallRequest()) {
            //The app has been successfully installed and verified by MonoBill.
            //Store the information below in your database to make api calls later
            $accessToken = $request->query('access_token');
            $storeDomain = $request->query('store');
            $storeId = $request->query('store_id');

            //Redirect the user back to MonoBill Admin, specifically to this app page
            return redirect('https://' . $storeDomain . '/admin/apps/' . $request->query('app_id'));
        } else {
            //The installation request was not valid, show a message to the user.
            die('This request is invalid.');
        }
    }

}
