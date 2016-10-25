<?php

namespace IDE;

use Symfony\Component\Filesystem\Filesystem;

Class Writer {

    public function __construct(array $list, $path) {

        $content = file_get_contents($path);
        $content = preg_replace("/php[\s\S]+? abstract/", $this->property($list), $content);
        $content = str_replace("<?", "<?php", $content);
        $content = str_replace("class", "abstract class", $content);
        
        try {
            $file = new Filesystem();
            $file->dumpFile($path, $content);
        } catch (\Exception $e) {
            var_dump($e);
        }
    }

    private function property(array $values){
        
        $appen = array();
        
        
        $appen[] = sprintf( "%s \t/**%s", PHP_EOL, PHP_EOL );
        foreach($values as $value){
            array_push($appen , sprintf( "\t* @property %s %s %s", $value['method'] , $value['type'], PHP_EOL ));
        }
        $appen[] = sprintf( "\t**/%s", PHP_EOL );
        
        return implode("" , $appen); 
    }
    
}
