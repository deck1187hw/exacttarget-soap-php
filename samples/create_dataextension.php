<?php
// This call will create a new Data extension 'my_data_extension' with custom columns
require('../exacttarget_soap_client.php');
require('../creds.php');

try	{

	$client = new ExactTargetSoapClient($wsdl, array('trace'=>1));
	$client->username = $username;
	$client->password = $password;

	$name = 'my_data_extension';

    $newde = new ExactTarget_DataExtension();
    $newde->Name = $name;
    $newde->CustomerKey = $name;
    $newde->IsSendable = false;
    $newde->IsTestable = false;
    $newde->CategoryID = 1299971;
    $newde->Description = 1;


    $fnamefield = new ExactTarget_DataExtensionField();
    $fnamefield->Name = 'column1';
    $fnamefield->IsPrimaryKey = false;
    $fnamefield->MaxLength = 4000;
    $fnamefield->FieldType = ExactTarget_DataExtensionFieldType::Text;
    $newde->Fields[] = $fnamefield;


    $fnamefield = new ExactTarget_DataExtensionField();
    $fnamefield->Name = 'column2';
    $fnamefield->IsPrimaryKey = false;
    $fnamefield->MaxLength = 4000;
    $fnamefield->FieldType = ExactTarget_DataExtensionFieldType::Text;
    $newde->Fields[] = $fnamefield;

    $fnamefield = new ExactTarget_DataExtensionField();
    $fnamefield->Name = 'column3';
    $fnamefield->IsPrimaryKey = false;
    $fnamefield->MaxLength = 4000;
    $fnamefield->FieldType = ExactTarget_DataExtensionFieldType::Text;
    $newde->Fields[] = $fnamefield;

    $fnamefield = new ExactTarget_DataExtensionField();
    $fnamefield->Name = 'column4';
    $fnamefield->IsPrimaryKey = false;
    $fnamefield->MaxLength = 4000;
    $fnamefield->FieldType = ExactTarget_DataExtensionFieldType::Text;
    $newde->Fields[] = $fnamefield;


    $object = new SoapVar($newde, SOAP_ENC_OBJECT, 'DataExtension', "http://exacttarget.com/wsdl/partnerAPI");
    $request = new ExactTarget_CreateRequest();
    $request->Options = NULL;
    $request->Objects = array($object);

    $results = $client->Create($request);
	print_r($results);

} catch (SoapFault $e) {
	print_r($e);
}
?>