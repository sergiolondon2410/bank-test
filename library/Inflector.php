<?php
	class Inflector
	{
		public static function camel($value)
		{
			$segments = explode('-', $value);
			array_walk($segments, function(&$item){
				$item = ucfirst($item);
			});	
			return implode('', $segments);
		}

		public static function lowerCamel($value)
		{
			return lcfirst(static::camel($value));
		}

		public static function routeAdapter($value)
		{
			$local = str_replace('\\', '/', $value);
			// return str_replace($_SERVER['DOCUMENT_ROOT'], 'http://'.DB_HOST.'/', $local);
			return str_replace($_SERVER['DOCUMENT_ROOT'], 'http://'.DB_HOST, $local);
		}
	}