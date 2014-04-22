<?php

    if ($handle = opendir('.')) {
        while (false !== ($entry = readdir($handle))) {
            if ($entry != "." && $entry != "..") {
                if($entry!=$archivo && $entry!="autoventa.php")
					unlink($entry);
            }
        }
        closedir($handle);
   }

				header("Content-Length: " . filesize ( $archivo ) ); 
                header("Content-type: application/octet-stream"); 
                header("Content-disposition: attachment; filename=".basename($archivo));
                header('Expires: 0');
                header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
                ob_clean();
                flush();

                readfile($archivo);




?>