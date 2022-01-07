<?php
	Session::init();
	function siteTheme($value='url')
	{
		global $site;
		return $site['theme'][$value];
	}

	$templates = new League\Plates\Engine(siteTheme('path'));

	Flight::route('(/@folder(/@action(/@id)))', function($reqFolder, $reqAction, $reqId) use ($templates){
		$controller = '\Project\Controller{folder}\{action}';
		if(empty($reqFolder)){
			$folder = "Info";
			$action = "Index";
			$controller = str_replace("{folder}",str_replace(" ","",' \ '.ucfirst($folder)),$controller);
			$controller = str_replace("{action}",ucfirst($action),$controller);
			$templates->loadExtension(new $controller());
			echo $templates->render(siteTheme("moduleshort").strtolower($folder).'/'.strtolower($action));
		}else{
			$folder ="";
			$folderNp ="";
			$explodeTmpFolder =  explode("-",$reqFolder);
			foreach ($explodeTmpFolder as $etfKey => $etfValue) {
				$folder.='/'.ucfirst($etfValue);
				$folderNp.=str_replace(" ","",' \ '.ucfirst($etfValue));
			}
			if ((empty($reqAction) || strtolower($reqAction) == "index") && file_exists(siteTheme("path").siteTheme("moduleshort").strtolower($folder).'/index.php')) {
				$action = "Index";
				$controller = str_replace("{folder}",$folderNp,$controller);
				$controller = str_replace("{action}",$action,$controller);
				$templates->loadExtension(new $controller());
				echo $templates->render(siteTheme("moduleshort").strtolower($folder).'/'.strtolower($action));
			}else{
				$action ="Index";
				$explodeTmpAction =  explode("-",$reqAction);
				foreach ($explodeTmpAction as $etaKey => $etaValue) {
					$action.=ucfirst($etaValue);
				}
				if (!file_exists(siteTheme("path").siteTheme("moduleshort").strtolower($folder).'/'.strtolower($action).'.php')) {
					Flight::notFound();
				}else{
					$controller = str_replace("{folder}",$folderNp,$controller);
					$controller = str_replace("{action}",$action,$controller);
					$templates->loadExtension(new $controller());
					if (!empty($reqId)) {
						$data['id']=$reqId;
						echo $templates->render(siteTheme("moduleshort").strtolower($folder).'/'.strtolower($action), $data);
					}else{
						echo $templates->render(siteTheme("moduleshort").strtolower($folder).'/'.strtolower($action));
					}
				}
			}
		}
	});

	Flight::map('notFound', function(){
	    // Handle not found
	    Flight::redirect(siteTheme());
	});

	Flight::map('error', function(){
	    // Handle not found
	    Flight::redirect(siteTheme());
	});

	Flight::start();


	Flight::stop();