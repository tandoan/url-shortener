<?php
abstract class DAO {
	public function GetNextID();
	public function Save($NextID, $ShortURL, $Url);
	public function GetURL($ID);
}

class URLShortenerFactory{

	public function Create($DAO, $UnShortenPlugins = array(), $CharacterSet = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'){
		$BaseConverter = new BaseConverter($CharacterSet);
		return new URLShortener($BaseConverter, $DAO, $UnShortenPlugins);
	}
}

class URLShortener{

	private $BaseConverter;
	private $DAO;
	private $UnShortenPlugins = array();

	public function __construct($BaseConverter, $DAO, $UnShortenPlugins = array()){
		$this->BaseConverter = $BaseConverter;
		$this->DAO = $DAO;

		$this->UnShortenPlugins = $UnShortenPlugins;
	}

	public function Shorten($Url) {
		$NextID = $this->DAO->GetNextID();
		$ShortURL = $this->BaseConverter->Convert($NextID);
		$this->DAO->Save($NextID, $ShortURL, $Url);
		return $ShortURL;
	}

	public function Unshorten($Key) {
		$ID = $this->BaseConverter->ConvertBAck($Key);
		$URL = $this->DAO->GetURL($ID);

		//TODO: Add a hook to track things, such as stats in the future
		/*
		foreach($this->UnShortenPlugins as $Plugin){
			try {
				$Plugin->Execute($Key, $URL);

			} catch Exception($PluginException){
				
			}
		}
		 */
		return $URL;
	}
}
