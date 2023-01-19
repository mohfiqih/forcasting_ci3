<?php


class Exs extends CI_Controller {

    public function index()
    {
        $this->load->library("Exsmooth");

        $data = [
            [
                'year' => 2021,
                'month'=> 01,
                'value'=> 150
            ],
            [
                'year' => 2021,
                'month'=> 02,
                'value'=> 167
            ],
            [
                'year' => 2021,
                'month'=> 03,
                'value'=> 180
            ],
            [
                'year' => 2021,
                'month'=> 04,
                'value'=> 145
            ],
            [
                'year' => 2021,
                'month'=> 05,
                'value'=> 150
            ],
            [
                'year' => 2021,
                'month'=> 06,
                'value'=> 165
            ],
            [
                'year' => 2021,
                'month'=> 07,
                'value'=> 155
            ]
        ];
        $ex = new Exsmooth();
        $hasil = $ex->hitung($data);

        $this->load->view('result', ['hasil' => $hasil]);

    }
}
