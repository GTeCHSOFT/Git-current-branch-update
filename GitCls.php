<?php
    class Git
    {
        public function Branch()
        {
            return exec('git symbolic-ref --short HEAD');
        }

        public function Fetch()
        {
            return exec('git fetch');
        }

        public function Version()
        {
            return exec('git --version');
        }

        public function Count_Commits()
        {   
            $b = exec('git symbolic-ref --short HEAD');
            exec('git rev-list --left-right '.$b.'...refs/remotes/origin/'.$b,$output);
            $in=array();; $out=array();;
            foreach ($output as $line) {
                $line = (strpos($line, '>') !== false) ? $in[] = $line : $out[] = $line ;
            }
            return array('down' => count($in), 'up' => count($out));
        }

        public function Pull()
        {
            $b = exec('git symbolic-ref --short HEAD');
            return exec('git pull origin '.$b);
        }
    }
?>
