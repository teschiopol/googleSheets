<?php

require 'config.php';

switch($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        $range = $_GET['range'] ?? null;
        if(!empty($range) && preg_match("/^[A-Z]{1,2}[0-9]{1,3}:[A-Z]{1,2}[0-9]{1,3}$/i", $range)) {
            $sheetName .= '!'.$range;
        }
        $response = $service->spreadsheets_values->get($spreadSheetId, $range);
        $values = $response->getValues();
        if(!empty($values)){
            print("<pre>".print_r($values,true)."</pre>");
        }
        break;
    case 'POST':
        $operation = $_POST['operation'] ?? 'append';
        unset($_POST['operation']);
        $params = [
            'valueInputOption' => 'RAW'
        ];

        if ($operation === 'append') {
            $values = array();
            foreach($_POST as $value){
                $values[] = array($value);
            }
            $body = new Google_Service_Sheets_ValueRange([
                'values' => $values
            ]);
            $params['insertDataOption'] = 'INSERT_ROWS';
            $result = $service->spreadsheets_values->append(
                $spreadSheetId,
                $sheetName,
                $body,
                $params,
            );
        } elseif ($operation === 'update'){
            $range = $_POST['range'] ?? null;
            unset($_POST['range']);
            if(!empty($range) && preg_match("/^[A-Z]{1,2}[0-9]{1,3}:[A-Z]{1,2}[0-9]{1,3}$/i", $range)) {
                $sheetName .= '!'.$range;
            }
            $values = array();
            foreach($_POST as $value){
                $values[] = array($value);
            }
            $body = new Google_Service_Sheets_ValueRange([
                'values' => $values
            ]);
            $result = $service->spreadsheets_values->update(
                $spreadSheetId,
                $sheetName,
                $body,
                $params,
            );
        }
        break;
    default:
        echo 'Method not Allowed.';
}
