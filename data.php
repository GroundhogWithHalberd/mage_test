<?php
class Data
{
	private $email;
	private $domain;
	private $date;
    public function __construct($value, $time)
    {
		$this->email = $value;
		$domain_raw = substr($value, strpos($value, "@")+1, strlen($value));
		$this->domain = substr($domain_raw, 0, strpos($domain_raw, "."));
		$this->date = $time;
    }
	public function getEmail() {
		return $this->email;
	}
	public function getDomain() {
		return $this->domain;
	}
	public function getDate() {
		return $this->date;
	}
}