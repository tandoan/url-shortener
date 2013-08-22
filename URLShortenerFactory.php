<?php
require_once('URLShortener.php');
require_once('BaseConverter.php');

class URLShortenerFactory{

	public function Create($DAO, $UnShortenPlugins = array(), $CharacterSet = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'){
		$BaseConverter = new BaseConverter($CharacterSet);
		return new URLShortener($BaseConverter, $DAO, $UnShortenPlugins);
	}
}
