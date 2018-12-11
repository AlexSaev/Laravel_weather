<?php

namespace App\Client;

use GuzzleHttp\Client;

class OpenWeatherClient
{
    public function postVkWall()
    {
        $token = "63a883dd63a883dd63a883dd0663cfecb4663a863a883dd3fa61dd5cc0d6ed10919cd25";
        $id = "-157824880";
        $message = "Rabotai_pozhaluista";
        $v = 5.92;

        $url = "https://api.vk.com/method/wall.post?owner_id={$id}&message={$message}
        &access_token={$token}&v={$v}";
        $client = new Client();
        $response = $client->post($url);

//   public function makeWallPost()
//    {
//        $token = "63a883dd63a883dd63a883dd0663cfecb4663a863a883dd3fa61dd5cc0d6ed10919cd25";
//
//        $id = "-157824880";
//
//        $query = file_get_contents
//        (
//            "https://api.vk.com/method/wall.post?owner_id=".$id.
//            "&message=".urlencode("Biba_i_boba").
//            "&access_token=".$token.
//            "&v=5.92"
//        );
//        header('location: /makeWallPost');
//    }

        return $response;

    }
}