<?php
/**
 * CsvDataSource class implements IDataSource
 * To process csv data set.
 */
class CsvDataSource implements IDataSource
{		

	/**
	 * updateCsv to update the current CSV
	 * @param Filename string.
	 * @param List array.
	 */	
	function updateCsv($filename='', $list=Array())
	{		
		if(!file_exists($filename) || !is_readable($filename))
			return FALSE;

		$fp = fopen($filename, 'a');

		foreach ($list as $fields) {
			fputcsv($fp, $fields);
		}

		fclose($fp);
	}

	/**
	 * updateCsv to update the current CSV
	 * @param Filename string.
	 * @param Delimiter string.
	 * return data for calculated values
	 */	
	function calculateCsv($filename='', $delimiter=',')
	{			
		if(!file_exists($filename) || !is_readable($filename))
			return FALSE;
		
		$data = array();
		if (($handle = fopen($filename, 'r')) !== FALSE)
		{
			while (($row = fgetcsv($handle, 1000, $delimiter)) !== FALSE)
			{
				//can be improved by gender segments, header values
				if(is_numeric($row[0])) {			  
					$data['csv_data'][] =  $row[0];
				}
			}
			fclose($handle);
		}	
		
		$data['dataSum'] = array_sum($data['csv_data']);
		$data['dataCount'] = count($data['csv_data']);
		$data['avg'] = $data['dataSum']/$data['dataCount']." cms Average Height";
		$data['UserValue'] = end($data['csv_data']);
		$data['MaxValue'] = max((integer)$data['avg'], (integer)$data['UserValue']);
		if($data['MaxValue'] == $data['UserValue']) {
			$data['msg'] = 'You are above the average height for all males&#039; females';
		}
		else {
			$data['msg'] = 'You are below the average height for all males&#039; females';
		}	
		
		$resultData['avg'] = $data['avg'];
		$resultData['msg'] = $data['msg'];

		echo json_encode( $resultData );
		return $resultData;
	}
}
?>