<?php

class Exsmooth {

    protected $constant = [];

    public function __construct()
    {
        $this->set_constant();
    }

    public function hitung($data)
    {
        $Fb     = 0;
        $Yb     = 0;
        $res    = [];
        $totalData= count($data);
        foreach($this->constant as $index => $a)
        {
            
            foreach($data as $k=>$v)
            {
                $periode = $this->ThBulanIndo($v['year']. '-'. $v['month']);
                #Rumus Single Exsponential Smoothing
                #????????+1 = ????X???? + (1 − ????)????b
                if( $k == 0 )
                {
                    $F = $v['value'];
                }else{
                    $F = ( $a * $Yb ) + ( ( 1 - $a) * $Fb );
                }
                
                $error  = $v['value'] - $F;
                $mse    = pow($error, 2);
                $pe     = abs($error / $v['value']);
                $mae    = abs($error);
                
                $res[$a][$k] = [
                                'n'         => $k+1,
                                'periode'   => $periode,
                                'xt'        => $v['value'], 
                                'ft'        => $F, 
                                'error'     => $error,
                                'mse'       => $mse,
                                'pe'        => $pe,
                                'mae'       => $mae
                                
                            ];
                
                $total['error'][$a]  = isset($total['error'][$a]) ? $total['error'][$a] + $error : $error;
                $total['mse'][$a]    = isset($total['mse'][$a]) ? $total['mse'][$a] + $mse : $mse;
                $total['pe'][$a]     = isset($total['pe'][$a]) ? $total['pe'][$a] + $pe : $pe;
                $total['mae'][$a]    = isset($total['mae'][$a]) ? $total['mae'][$a] + $mae : $mae;

                #menambahkan 1 data ke depan
                if( $k == ( $totalData - 1 ) )
                {
                    #Hitung 1 data ke depan
                    $last = $k + 1;
                    $periode = $this->ThBulanIndo(date('Y-m', strtotime("+1 MONTHS", strtotime($v['year'] .'-'. $v['month']))));
                    $Yb  = $v['value'];
                    $Fb  = $F; 
                    $F   = ( $a * $Yb ) + ( ( 1 - $a) * $Fb );
                    
                    $res[$a][$last] = ['n' => $k+2, 'periode' => $periode, 'xt' => 0, 'ft' => $F, 'error' => 0, 'mse' => 0, 'pe' => 0];
                    
                }

                $Yb = $v['value'];
                if( $k == 0 )
                {
                    $Fb = $v['value'];
                }else{
                    $Fb = $F;
                }
            }
        }
        
        #Hitung RMSE & MAPE
        foreach($this->constant as $index => $c )
        {
            $total['rmse'][$c] = sqrt( ($total['mse'][$c]/$totalData) );
            $total['mape'][$c] = $total['pe'][$c] / $totalData * 100;
            $total['mae'][$c]  = $total['mae'][$c]/$totalData;
            $total['mse'][$c]  = $total['mse'][$c]/$totalData;
            $total['mae'][$c]  = $total['mae'][$c]/$totalData;
        }


        $results = [
            'data'  => $res,
            'total' => $total
        ];
        return $results;
    }

    public function set_constant()
    {
        $this->constant = ["0.1","0.2","0.3","0.4","0.5","0.6","0.7","0.8","0.9"];
    }

    public function get_constant()
    {
        return $this->constant;
    }

    public function ThBulanIndo($date, $format = 'Y-m-d')
    {
        $f  = date('Y-m-d', strtotime($date));
        $ex = explode("-", $f);
        $Y  = $ex[0];
        $m  = $ex[1];
        $d  = $ex[2];

        switch( $m )
        {
            case '01':
                $bulan = 'Januari';
                break;
            case '02':
                $bulan = 'Februari';
                break;
            case '03':
                $bulan = 'Maret';
                break;
            case '04':
                $bulan = 'April';
                break;
            case '05':
                $bulan = 'Mei';
                break;
            case '06':
                $bulan = 'Juni';
                break;
            case '07':
                $bulan = 'Juli';
                break;
            case '08':
                $bulan = 'Agustus';
                break;
            case '09':
                $bulan = 'September';
                break;
            case '10':
                $bulan = 'Oktober';
                break;
            case '11':
                $bulan = 'November';
                break;
            case '12':
                $bulan = 'Desember';
                break;
        }
    
        return $Y . ' '. $bulan;
    }


}