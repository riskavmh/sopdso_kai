<?php 

    function today(){
        $today = Date('N');
        switch ($today) {
            case 1:
                $today = "Senin";
                break;
            case 2:
                $today = "Selasa";
                break;
            case 3:
                $today = "Rabu";
                break;
            case 4:
                $today = "Kamis";
                break;
            case 5:
                $today = "Jumat";
                break;
            case 6:
                $today = "Sabtu";
                break;
            case 7:
                $today = "Minggu";
                break;

            default:
                $today = Date('l');
                break;
        }
        return $today;
    }

    function this_m(){
        $this_m = Date('m');
        switch ($this_m) {
            case 1:
                $this_m = "Januari";
                break;
            case 2:
                $this_m = "Februari";
                break;
            case 3:
                $this_m = "Maret";
                break;
            case 4:
                $this_m = "April";
                break;
            case 5:
                $this_m = "Mei";
                break;
            case 6:
                $this_m = "Juni";
                break;
            case 7:
                $this_m = "Juli";
                break;
            case 8:
                $this_m = "Agustus";
                break;
            case 9:
                $this_m = "September";
                break;
            case 10:
                $this_m = "Oktober";
                break;
            case 11:
                $this_m = "November";
                break;
            case 12:
                $this_m = "Desember";
                break;

            default:
                $this_m = Date('F');
                break;
        }
        return $this_m;
    }

    function next_1m(){
        $next_1m = Date("m",strtotime('+1 months'));
        switch ($next_1m) {
            case 1:
                $next_1m = "Januari";
                break;
            case 2:
                $next_1m = "Februari";
                break;
            case 3:
                $next_1m = "Maret";
                break;
            case 4:
                $next_1m = "April";
                break;
            case 5:
                $next_1m = "Mei";
                break;
            case 6:
                $next_1m = "Juni";
                break;
            case 7:
                $next_1m = "Juli";
                break;
            case 8:
                $next_1m = "Agustus";
                break;
            case 9:
                $next_1m = "September";
                break;
            case 10:
                $next_1m = "Oktober";
                break;
            case 11:
                $next_1m = "November";
                break;
            case 12:
                $next_1m = "Desember";
                break;

            default:
                $next_1m = Date('F');
                break;
        }
        return $next_1m;
    }

    function next_2m(){
        $next_2m = Date("m",strtotime('+2 months'));
        switch ($next_2m) {
            case 1:
                $next_2m = "Januari";
                break;
            case 2:
                $next_2m = "Februari";
                break;
            case 3:
                $next_2m = "Maret";
                break;
            case 4:
                $next_2m = "April";
                break;
            case 5:
                $next_2m = "Mei";
                break;
            case 6:
                $next_2m = "Juni";
                break;
            case 7:
                $next_2m = "Juli";
                break;
            case 8:
                $next_2m = "Agustus";
                break;
            case 9:
                $next_2m = "September";
                break;
            case 10:
                $next_2m = "Oktober";
                break;
            case 11:
                $next_2m = "November";
                break;
            case 12:
                $next_2m = "Desember";
                break;

            default:
                $next_2m = Date('F');
                break;
        }
        return $next_2m;
    }

    function prev_1m(){
        $prev_1m = Date("m",strtotime('-1 months'));
        switch ($prev_1m) {
            case 1:
                $prev_1m = "Januari";
                break;
            case 2:
                $prev_1m = "Februari";
                break;
            case 3:
                $prev_1m = "Maret";
                break;
            case 4:
                $prev_1m = "April";
                break;
            case 5:
                $prev_1m = "Mei";
                break;
            case 6:
                $prev_1m = "Juni";
                break;
            case 7:
                $prev_1m = "Juli";
                break;
            case 8:
                $prev_1m = "Agustus";
                break;
            case 9:
                $prev_1m = "September";
                break;
            case 10:
                $prev_1m = "Oktober";
                break;
            case 11:
                $prev_1m = "November";
                break;
            case 12:
                $prev_1m = "Desember";
                break;

            default:
                $prev_1m = Date('F');
                break;
        }
        return $prev_1m;
    }

    function prev_2m(){
        $prev_2m = Date("m",strtotime('-2 months'));
        switch ($prev_2m) {
            case 1:
                $prev_2m = "Januari";
                break;
            case 2:
                $prev_2m = "Februari";
                break;
            case 3:
                $prev_2m = "Maret";
                break;
            case 4:
                $prev_2m = "April";
                break;
            case 5:
                $prev_2m = "Mei";
                break;
            case 6:
                $prev_2m = "Juni";
                break;
            case 7:
                $prev_2m = "Juli";
                break;
            case 8:
                $prev_2m = "Agustus";
                break;
            case 9:
                $prev_2m = "September";
                break;
            case 10:
                $prev_2m = "Oktober";
                break;
            case 11:
                $prev_2m = "November";
                break;
            case 12:
                $prev_2m = "Desember";
                break;

            default:
                $prev_2m = Date('F');
                break;
        }
        return $prev_2m;
    }

    
    function prev_3m(){
        $prev_3m = Date("m",strtotime('-3 months'));
        switch ($prev_3m) {
            case 1:
                $prev_3m = "Januari";
                break;
            case 2:
                $prev_3m = "Februari";
                break;
            case 3:
                $prev_3m = "Maret";
                break;
            case 4:
                $prev_3m = "April";
                break;
            case 5:
                $prev_3m = "Mei";
                break;
            case 6:
                $prev_3m = "Juni";
                break;
            case 7:
                $prev_3m = "Juli";
                break;
            case 8:
                $prev_3m = "Agustus";
                break;
            case 9:
                $prev_3m = "September";
                break;
            case 10:
                $prev_3m = "Oktober";
                break;
            case 11:
                $prev_3m = "November";
                break;
            case 12:
                $prev_3m = "Desember";
                break;

            default:
                $prev_3m = Date('F');
                break;
        }
        return $prev_3m;
    }

    

?>