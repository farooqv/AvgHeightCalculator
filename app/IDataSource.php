<?php
/**
 * IDataSource interface.
 * To be implement by all data source(s) 
 */	
interface IDataSource
{
    public function updateCsv($filename='', $delimiter=',');
    
    public function calculateCsv($filename='', $list=Array());
}
?>
