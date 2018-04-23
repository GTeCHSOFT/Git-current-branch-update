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
            exec('git status -z -u', $status);
            $b = exec('git symbolic-ref --short HEAD');
            exec('git rev-parse '.$b, $rev_parse);
            exec('git rev-parse --symbolic-full-name '.$b.'@{u}', $rev_parse2);
            exec('git rev-list --left-right '.$b.'...refs/remotes/origin/'.$b,$output);
            exec('git for-each-ref --format %(refname) %(objectname) --sort -committerdate', $each_ref);
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
