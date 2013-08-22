<?php
abstract class DAO {
	public function GetNextID();
	public function Save($NextID, $ShortURL, $Url);
	public function GetURL($ID);
}
