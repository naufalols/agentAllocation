<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Webhook extends CI_Controller
{
    public function webhookGet()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        // $appId = $this->input->post('app_id');


        if ($data['app_id'] == 'ext-74mgmdogujbegsga9') {
            $auth = curl_qiscus_auth();
            // $auth = json_decode($curl_auth);
            print_r($auth);
            die();
            $newdata = array(
                    'id'  => $auth['data']['user']['id'],
                    'name'     => $auth['data']['user']['name'],
                    'authentication_token' => $auth['data']['user']['authentication_token']
            );

            $this->session->set_userdata($newdata);


            $candidatAgent = $data['candidate_agent'];
            $email = $data['email'];
            $isNewSession = $data['is_new_session'];
            $isResolved = $data['is_resolved'];
            $latestService = $data['latest_service'];
            $name = $data['name'];
            $roomId = $data['room_id'];
            $source = $data['source'];
        } else {
            echo "gagal";
        };
    }

    public function checkSession()
    {
        print_r($this->session->userdata());
    }

    public function destroySession()
    {
        $this->session->sess_destroy();
    }
}
