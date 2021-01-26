<?php 
	namespace Views;

	require 'vendor/autoload.php';

	class MainView{

		private $filename;
		private $infos;
		private $loader;
		private $twig;
		private $template;

		public function __construct(String $file, Array $info)
		{
			$this->filename = $file;
			$this->infos = $info;

			$this->loader = new \Twig\Loader\FilesystemLoader('Views/Pages/');
			$this->twig = new \Twig\Environment($this->loader);
	   	$this->template = $this->twig->load($this->filename.'.php');
		}

		public function render()
	   {
	   	echo $this->template->render($this->infos);
	   }

	   public function renderBlock(String $block, Array $arr)
	   {
	   	echo $this->template->renderBlock($block, $arr);
	   }
   }
