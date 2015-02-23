<?php
if(!class_exists('Bl_Cache_Html_Manager')){
    class Bl_Cache_Html_Manager
    {

        protected $cache_directory;

        public function __construct($cache_directory)
        {

            $this->cache_directory = $cache_directory;

        }


        public function cache_html($html, $id)
        {

            $file_path = $this->get_cache_html_dir() . $id . ".html";

            if ($file = fopen($file_path, "w")) {

                fwrite($file, $html);

                fclose($file);

            }

        }

        public function has_cached_html($id)
        {

            $file_path = $this->get_cache_html_dir() . $id . ".html";

            if (file_exists($file_path)) {

                return file_get_contents($file_path);

            }

            return false;

        }

        public function get_cache_html_dir()
        {

            /*   $upload_dir = wp_upload_dir();

               $upload_dir = $upload_dir['basedir'] . "/bl-slider/";

               return $upload_dir;*/

            return $this->cache_directory;

        }

        public function create_id_cache_html($string)
        {

            return md5($string);

        }

        public function delete_cache()
        {

            try {

                $files = scandir($this->get_cache_html_dir());

                array_shift($files); // remove .

                array_shift($files); // remove ..

                foreach ($files as $file) {

                    unlink($this->get_cache_html_dir() . $file);

                }

            } catch (Exception $e) {

                return false;

            }

            return true;

        }
    }
}