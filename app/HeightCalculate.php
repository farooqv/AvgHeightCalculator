<?php
/**
 * HeightCalculate class 
 * To process data source.
 */
class HeightCalculate
{
    private $dataSource;
    
    public function __construct(IDataSource $source)
    {
        $this->dataSource = $source;
    }
    
    public function calculateProcess($filename='', $list=Array()) 
    {	
		$this->dataSource->updateCsv($filename, $list);
        $this->dataSource->calculateCsv($filename , $delimiter=',');        
    }
}
?>