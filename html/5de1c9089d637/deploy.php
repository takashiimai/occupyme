<?php
exec('cd /home/maitakajp/www/occupyme.maitakajp.com; git pull', $op, $rv);
exec('cp /home/maitakajp/www/occupyme.maitakajp.com/html/.htaccess.production /home/maitakajp/www/occupyme.maitakajp.com/html/.htaccess');
