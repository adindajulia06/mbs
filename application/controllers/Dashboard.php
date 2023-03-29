<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_dashboard');
        $this->load->model('M_website');
        $this->nama = $this->session->userdata('nama');
        $this->username = $this->session->userdata('username');

        $this->onlogin = $this->session->userdata('status', 'login');

        if (!$this->onlogin) {
            redirect(base_url('auth'));
            return;
        }
    }

    public function router_setup()
    {
        $dataweb = new M_website();
        $router = new M_dashboard();

        $server = $router->get('router');

        if ($server->num_rows() > 0) {
            redirect(base_url('router/setting'));
        } else {
            $data = [
                'title' => 'Router Setup',
                'logo' => $dataweb->website()->logo,
                'logotext' => $dataweb->website()->logo_text,
                'author' => $dataweb->website()->author,
            ];
            $this->load->view('router/setup', $data);
        }
    }

    public function router_add()
    {
        $router = new M_dashboard();

        $post = $this->input->post(null, true);

        $input = array(
            'nama' => $post['name'],
            'dns' => $post['dns'],
            'ip' => $post['ip'],
            'username' => $post['username'],
            'password' => encrypt($post['password']),
            'interface' => $post['interface'],
        );

        $router->input('router', $input);
        $this->session->set_flashdata('message_success', 'Berhasil menambahkan router');
        redirect(base_url('router/setting'));
    }

    public function router_setting()
    {
        $router = new M_dashboard();
        $dataweb = new M_website();

        $server = $router->get('router');

        if ($server->num_rows() == 0) {
            redirect(base_url('router/setup'));
        } else {
            $data = [
                'title' => 'Pengaturan Router',
                'logo' => $dataweb->website()->logo,
                'logotext' => $dataweb->website()->logo_text,
                'author' => $dataweb->website()->author,
                'router' => $server->result(),
            ];

            $this->load->view('router/setting', $data);
        }
    }

    public function router_save()
    {
        $query = new M_dashboard();

        $server = $query->get('router');

        foreach ($server->result() as $router) {
            $target = $router->id;
        }

        $post = $this->input->post(null);

        $update = array(
            'nama' => $post['name'],
            'dns' => $post['dns'],
            'ip' => $post['ip'],
            'username' => $post['username'],
            'password' => encrypt($post['password']),
            'interface' => $post['interface'],
        );

        $query->update('id', $target, 'router', $update);

        $this->session->set_flashdata('message_success', 'Data router berhasil diganti ');
        redirect(base_url('router/setting'));
    }

    public function router_ping()
    {
        $query = new M_dashboard();


        $server = $query->get('router');


        foreach ($server->result_array() as $row) {
            $host = $row['ip'];
            $uname = $row['username'];
            $pass = decrypt($row['password']);
        }
        $API = new API();
        $API->debug = false;
        if ($API->connect($host, $uname, $pass)) {
            $this->session->set_flashdata('message_success', 'Router Connected');
            redirect(base_url('router/setting'));
        } else {
            $this->session->set_flashdata('message_err', 'Router Not Connected');
            redirect(base_url('router/setting'));
        }
    }

    public function router_traffic()
    {
        $query = new M_dashboard();
        $server = $query->get('router');


        foreach ($server->result_array() as $row) {
            $host = $row['ip'];
            $uname = $row['username'];
            $pass = decrypt($row['password']);
            $interfaces =  $row['interface'];
        }

        $API = new API();
        if ($API->connect($host, $uname, $pass)) {

            $getinterface = $API->comm("/interface/monitor-traffic", array(
                'interface' => $interfaces,
                'once' => '',
            ));

            $rows = array();
            $rows2 = array();


            $ftx = $getinterface[0]['rx-bits-per-second'];
            $frx = $getinterface[0]['tx-bits-per-second'];

            $rows['name'] = 'Tx';
            $rows['data'][] = $ftx;
            $rows2['name'] = 'Rx';
            $rows2['data'][] = $frx;
            $result = array();

            array_push($result, $rows);
            array_push($result, $rows2);
            print json_encode($result);
        }
    }

    public function index()
    {
        $dataweb = new M_website();
        $voucher = new M_dashboard();

        $server = $voucher->get('router');

        if ($server->num_rows() == 0) {
            redirect(base_url('router/setup'));
        } else {
            foreach ($server->result_array() as $row) {
                $host = $row['ip'];
                $uname = $row['username'];
                $pass = decrypt($row['password']);
                $inter = $row['interface'];
            }

            $API = new API();
            if ($API->connect($host, $uname, $pass)) {

                // get hotspot info
                $hotspotuser = $API->comm("/ip/hotspot/user/print");
                $hotspotactive = $API->comm("/ip/hotspot/active/print");
                $hotspotprofile = $API->comm("/ip/hotspot/user/profile/print");


                //get mikrotik system clock
                $getclock = $API->comm("/system/clock/print");
                $clock = $getclock[0];
                $timezone = $getclock[0]['time-zone-name'];

                // get MikroTik system clock
                $getresource = $API->comm("/system/resource/print");
                $resource = $getresource[0];

                // get routeboard info
                $getrouterboard = $API->comm("/system/routerboard/print");

                $routerboard = $getrouterboard[0];


                //get interface
                $getinterface = $API->comm("/interface/print");

                //get intraface db
                $monitor = $inter;


                $data = [
                    'title' => 'Dashboard',
                    'logotext' => $dataweb->website()->logo_text,
                    'logo' => $dataweb->website()->logo,
                    'author' => $dataweb->website()->author,
                    'month' => $voucher->month(),
                    'vcrmonth' => $voucher->vcrmonth(),
                    'today' => $voucher->today(),
                    'vcrtoday' => $voucher->vcrtoday(),
                    'yesterday' => $voucher->yesterday(),
                    'vcrystrdy' => $voucher->vcrystrdy(),
                    'hotspotuser' => count($hotspotuser),
                    'hotspotactive' => count($hotspotactive),
                    'hotspotprofile' => count($hotspotprofile),
                    'clock' => $clock['time'],
                    'uptime' => $resource['uptime'],
                    'timezone' => $timezone,
                    'model' => $routerboard['model'],
                    'architecture' => $resource['architecture-name'],
                    'version' => $resource['version'],
                    'interface' => $getinterface,
                    'traffics' => $monitor,
                    'nama' => $this->nama = $this->session->userdata('nama'),
                ];

                $this->load->view('dashboard', $data);
            } else {
                $this->session->set_flashdata('message_err', 'Router not connected');
                redirect(base_url('router/setting'));
            }
        }
    }

    public function generate_voucher()
    {

        $voucher = new M_dashboard();
        $dataweb = new M_website();

        $datadb = $voucher->get('services');

        if ($datadb->num_rows() == 0) {
            redirect(base_url('voucher/hotspot/addprofile'));
        } else {
            $server = $voucher->get('router');

            foreach ($server->result_array() as $row) {
                $host = $row['ip'];
                $uname = $row['username'];
                $pass = decrypt($row['password']);
            }

            $API = new API();
            if ($API->connect($host, $uname, $pass)) {

                // get hotspot info

                $server = $API->comm("/ip/hotspot/print");
                $profile = $datadb->result();
                $data = [
                    'title' => 'Generate Voucher',
                    'logotext' => $dataweb->website()->logo_text,
                    'logo' => $dataweb->website()->logo,
                    'author' => $dataweb->website()->author,
                    'server' => $server,
                    'profile' => $profile,
                ];
                $this->load->view('voucher/hotspot/generate', $data);
            } else {
                $this->session->set_flashdata('message_err', 'Router not connected');
                redirect(base_url('router/setting'));
            }
        }
    }
    public function profile_voucher()
    {
        $dataweb = new M_website();
        $voucher = new M_dashboard();

        $server = $voucher->get('router');

        foreach ($server->result_array() as $row) {
            $host = $row['ip'];
            $uname = $row['username'];
            $pass = decrypt($row['password']);
        }

        $API = new API();
        if ($API->connect($host, $uname, $pass)) {

            // get hotspot info
            $getprofile = $API->comm("/ip/hotspot/user/profile/print");

            $getpool = $API->comm("/ip/pool/print");

            $getallqueue = $API->comm("/queue/simple/print", array(
                "?dynamic" => "false",
            ));
            $data = [
                'title' => 'Hotspot Profile',
                'logo' => $dataweb->website()->logo,
                'logotext' => $dataweb->website()->logo_text,
                'author' => $dataweb->website()->author,
                'totalhotspotprofile' => $voucher->get('services')->num_rows(),
                'hotspotprofile' => $voucher->get('services')->result(),
                'getprofile' => $getprofile,
                'pool' => $getpool,
                'queue' => $getallqueue,


            ];
            $this->load->view('voucher/hotspot/profile', $data);
        } else {
            $this->session->set_flashdata('message_err', 'Mikrotik tidak konek ! Harap dicek kembali data mikrotik anda');
            redirect(base_url('router/setting'));
        }
    }

    public function addprofile_voucher()
    {
        $dataweb = new M_website();
        $voucher = new M_dashboard();
        $server = $voucher->get('router');

        foreach ($server->result_array() as $row) {
            $host = $row['ip'];
            $uname = $row['username'];
            $pass = decrypt($row['password']);
        }

        $API = new API();
        if ($API->connect($host, $uname, $pass)) {


            $data = [
                'title' => 'Add User Profile',
                'logotext' => $dataweb->website()->logo_text,
                'logo' => $dataweb->website()->logo,
                'author' => $dataweb->website()->author,
            ];
            $this->load->view('voucher/hotspot/addprofile', $data);
        } else {
            $this->session->set_flashdata('message_err', 'Router not connected');
            redirect(base_url('router/setting'));
        }
    }

    public function account_setting()
    {
        $dataweb = new M_website();
        $user = new M_dashboard();

        $data = [
            'title' => 'Pengaturan Akun',
            'logotext' => $dataweb->website()->logo_text,
            'logo' => $dataweb->website()->logo,
            'author' => $dataweb->website()->author,
            'user' => $user->account($this->username)->row_array(),
        ];
        $this->load->view('account/setting', $data);
    }

    public function changepassword()
    {
        $dataweb = new M_website();

        $data['title'] = "Pengaturan Akun";
        $data['logotext'] = $dataweb->website()->logo_text;
        $data['logo'] = $dataweb->website()->logo;
        $data['author'] = $dataweb->website()->author;
        $data['user'] = $this->db->get_where('users', ['username' =>
        $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('currentpassword', 'currentpassword', 'trim|required', array(
            'required' => 'Masukan Password saat ini'
        ));

        $this->form_validation->set_rules('new_password', 'new_password', 'trim|required|matches[repeat_password]', array(
            'required' => 'Masukan Password.',
            'matches' => 'Password Tidak Sama.',
        ));
        $this->form_validation->set_rules('repeat_password', 'repeat_password', 'trim|required|matches[new_password]', array(
            'required' => 'Masukan Password.',
            'matches' => 'Password Tidak Sama.',
        ));

        if ($this->form_validation->run() == false) {
            $this->load->view('account/setting', $data);
        } else {
            $currentpassword = $this->input->post('currentpassword');
            $newpassword    = $this->input->post('new_password');

            if (!password_verify($currentpassword, $data['user']['password'])) {
                $this->session->set_flashdata('gagal', '<div class="alert alert-danger" role="alert"> Password Sebelumnya Salah </div>');
                $this->session->set_flashdata('message_err', 'Password Sebelumnya Salah');

                redirect('account/setting');
            } else {
                if ($currentpassword == $newpassword) {
                    $this->session->set_flashdata('gagal', '<div class="alert alert-danger" role="alert"> Password Tidak Boleh Sama Dengan Sebelumnya</div>');
                    redirect('account/setting');
                } else {
                    $password_hash = password_hash($newpassword, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('username', $this->session->userdata('username'));
                    $this->db->update('users');

                    $this->session->set_flashdata('message_success', 'Password berhasil diganti !');
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"></div>');
                    redirect('account/setting');
                }
            }
        }
    }

    public function website_setting()
    {
    }
}
