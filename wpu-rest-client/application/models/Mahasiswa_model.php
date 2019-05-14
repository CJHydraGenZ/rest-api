<?php

// wajib
use GuzzleHttp\Client;

class Mahasiswa_model extends CI_model
{


    private $_client;


    public function __construct()
    {
        $this->_client  = new Client([
            'base_uri' => 'http://localhost:8080/rest-api/wpu-rest-server/api/',
            'auth' => ['cahya', '123']
        ]);
    }

    public function getAllMahasiswa()
    {
        // return $this->db->get('mahasiswa')->result_array();

        $response = $this->_client->request('GET', 'mahasiswa', [

            'query' => [
                'wpu-key' => 'cahya123'
            ]
        ]);
        // Masuk ke dalam object
        $result = json_decode($response->getBody()->getContents(), true);

        return $result['data'];
    }


    public function getMahasiswaById($id)
    {

        $response = $this->_client->request('GET', 'mahasiswa', [

            'query' => [
                'wpu-key' => 'cahya123',
                'id' => $id
            ]
        ]);
        // Masuk ke dalam object
        $result = json_decode($response->getBody()->getContents(), true);

        return $result['data'][0];
    }



    public function tambahDataMahasiswa()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "nrp" => $this->input->post('nrp', true),
            "email" => $this->input->post('email', true),
            "jurusan" => $this->input->post('jurusan', true),
            'wpu-key' => 'cahya123'
        ];

        // $this->db->insert('mahasiswa', $data);

        $response = $this->_client->request('POST', 'mahasiswa', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result;
    }

    public function hapusDataMahasiswa($id)
    {
        // // $this->db->where('id', $id);
        // $this->db->delete('mahasiswa', ['id' => $id]);


        // hapus menggunakan Guzzle
        $response = $this->_client->request('DELETE', 'mahasiswa', [
            'form_params' => [
                'id' => $id,
                'wpu-key' => 'cahya123'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result;
    }



    public function ubahDataMahasiswa()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "nrp" => $this->input->post('nrp', true),
            "email" => $this->input->post('email', true),
            "jurusan" => $this->input->post('jurusan', true),
            "id" => $this->input->post('id', true),
            'wpu-key' => 'cahya123'
        ];

        // $this->db->where('id', $this->input->post('id'));
        // $this->db->update('mahasiswa', $data);


        $response = $this->_client->request('PUT', 'mahasiswa', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result;
    }

    public function cariDataMahasiswa()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('nama', $keyword);
        $this->db->or_like('jurusan', $keyword);
        $this->db->or_like('nrp', $keyword);
        $this->db->or_like('email', $keyword);
        return $this->db->get('mahasiswa')->result_array();
    }
}
