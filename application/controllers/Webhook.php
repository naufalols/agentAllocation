<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Webhook extends CI_Controller
{
    public function webhookGet()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $token = $this->db->get_where('auth', array('app_id' => $data['app_id'] ));
        if ($token->num_rows() == 0) {
            $auth = curl_qiscus_auth();
            $newToken = array(
                'content' => $auth,
                'app_id' => $data['app_id']
            );
            $this->db->insert('auth', $newToken);
        }
        

        // $candidatAgent = $data['candidate_agent'];
            // $email = $data['email'];
            // $isNewSession = $data['is_new_session'];
            // $isResolved = $data['is_resolved'];
            // $latestService = $data['latest_service'];
            // $name = $data['name'];
            // $roomId = $data['room_id'];
            // $source = $data['source'];
    }

    public function checkSession()
    {
        print_r($this->session->userdata());
    }

    public function destroySession()
    {
        $this->session->sess_destroy();
    }

    public function sessioning()
    {
        $newdata = array(
                    'id'  => 123424,
                    'name'     => "nama",
                    'authentication_token' => "ceklist"
            );

        $this->session->set_userdata($newdata);
    }
}
