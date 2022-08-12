
<?php
class Config{
    protected $congif;
    public function __construct()
    {
        $this->config = parse_ini_file(__DIR__ . "/../../config.ini");
    }
    public function get(string $key) : string
    {
        if(isset($this->config[$key]))
        {
            return $this->config[$key];
        }
        /**
         * TODO : convert the below die() to appropriate error message
         * //If the config not found then throw error message depending on debug value of config file.
         */
        die('This config cannot be found'. $key);
    }
}
?>