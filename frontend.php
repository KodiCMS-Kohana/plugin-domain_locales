<?php defined('SYSPATH') or die('No direct access allowed.');

Observer::observe('frontpage_requested', function() {
	
	if (!Auth::instance()->logged_in())
	{
		$data = Config::get('domain_locales')->as_array();

		foreach ($data as $domain => $locale)
		{
			if (strpos($domain, Request::$host) !== FALSE)
			{
				I18n::lang($locale);
			}
		}
	}

});