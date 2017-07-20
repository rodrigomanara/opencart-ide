<?php

namespace IDE;

use Symfony\Component\Filesystem\Filesystem;
/**
 * @author Rodrigo Manara <me@rodrigomanara.co.uk>
 */
Class Writer {
    /**
     * 
     * @param array $list
     * @param type $path
     */
    public function __construct(array $list, $path) {

        $content = file_get_contents($path);
        #$count = strlen($content);
 
        $phpdoc = $this->property($list);
        $phpdoc = explode("\n", $phpdoc);
        $phpdoc = array_unique($phpdoc);
        $phpdoc = implode(PHP_EOL,$phpdoc);

        $new_content = str_replace("<?php", "<?php".PHP_EOL.$phpdoc, $content);

                
        try {
            $file = new Filesystem();
            $file->dumpFile($path, $new_content);
        } catch (\Exception $e) {
            var_dump($e);
        }
    }
    /**
     * Build an array of property
     * @param array $values
     * @return type
     */
    private function property(array $values){
        
        $append = array();
        
        
        $append[] = sprintf( "%s \t/**%s", PHP_EOL, PHP_EOL );
        foreach($values as $value){
            array_push($append , sprintf( "\t* @property %s %s %s", $value['method'] , $value['type'], PHP_EOL ));
        }
        $append[] = sprintf( "\t**/%s", PHP_EOL );
        
        return implode("" , $append); 
    }
    
}
