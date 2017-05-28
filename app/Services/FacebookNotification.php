<?php
namespace App\Services;

use App\Need;
use Facebook\Facebook;
use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;
use DomainException;
use Config;
use Log;

class FacebookNotification
{
    protected $fb;

    public function __construct()
    {
        //TODO: should come from the IoC container
        //hardcoding to validate the feature
        $this->fb = new Facebook([
          'app_id' => Config::get('services.facebook.app_id'),
          'app_secret' => Config::get('services.facebook.app_secret'),
          'default_graph_version' => 'v2.9',
          'default_access_token' => Config::get('services.facebook.page_token')
        ]);
    }

    public function publishNeed(Need $need)
    {
        $content   = [];
        $content[] = $need->needs;
        $content[] = $need->address;
        $content[] = $need->city;
        $content[] = "People - ". $need->heads;
        $content[] = $need->name.' - '.$need->telephone;

        try {
          
          $response = $this->fb->post('/me/feed', ['message' => implode($content, "\n")]);
          $response->decodeBody();
          return array_get($response->getDecodedBody(), 'id');

        } catch(FacebookResponseException $e) {
            Log::error($e);
            return false;
        } catch(FacebookSDKException $e) {
            Log::error($e);
            return false;
        }
    }
}