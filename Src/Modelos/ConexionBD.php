<?php
/**
 * summary
 */
class ConexionBD
{
    /**
     * summary
     */
    public function cBD()
    {
    	$bd = new PDO("mysql:host=localhost;dbname=restaurante","root","");
    	//para que nos tome las ñ
    	$bd -> exec("set names utf8");
    	return $bd;

        
    }
}

