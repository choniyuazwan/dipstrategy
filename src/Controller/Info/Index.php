<?php
    namespace Project\Controller\Info;
    
    use League\Plates\Engine;
    use League\Plates\Extension\ExtensionInterface;

	class Index implements ExtensionInterface {
        public function register(Engine $engine)
        {
            $engine->registerFunction('Controller', [$this, 'init']);
        }

        public function Init(){
            // if(!\Auth::CheckLoginData()){
            //     return \Io::redirect(DOMAIN."signin");
            // }

            return $this;
        }
	}