<?php
	require 'Response.php';

	class View extends Response
	{
		protected $template;
		protected $vars = array();
		protected $section;

		function __construct($section, $template, $vars = array())
		{
			$this->template = $template;
			$this->vars = $vars;
			$this->section = $section;
		}

		public function getTemplate()
		{
			return $this->template;
		}

		public function getVars()
		{
			return $this->vars;
		}

		public function getSection()
		{
			return $this->section;
		}

		public function execute()
		{
			$template = $this->getTemplate();
			$vars = $this->getVars();
			$section = $this->getSection();

			call_user_func(function() use($section, $template, $vars){
				extract($vars);
				ob_start();
				require "views/$section/$template.tpl.php";
				$tpl_content = ob_get_clean();
				require "views/layout/layout.tpl.php";
			});
		}
	}