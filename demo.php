<?php

date_default_timezone_set('Asia/Kolkata');

    ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    error_reporting(-1);

    require 'vendor/autoload.php';
    use Aws\DynamoDb\DynamoDbClient;
    use Aws\DynamoDb\Marshaler;

    $client = DynamoDbClient::factory(array(
        'region' => 'us-east-1',
        'version' => 'latest'
    ));
  //  echo $client;



$tableName = 'StudentList';
  //  $dynamodb = $sdk->createDynamoDb();
  //  $marshaler = new Marshaler();  
?>

<script>

var AWS = require("aws-sdk");

AWS.config.update({
 region: "us-east-1"
 });

var docClient = new AWS.DynamoDB.DocumentClient();

var params = {
  "RequestItems" : {
      "StudentList" : {
          "Keys" : [ {
              "StudentId" : "69"              
          },{
              "StudentId" : "90"              
          } ],
      }
  },
  "ReturnConsumedCapacity" : "TOTAL"
};


docClient.Get(params, function(err, data) {
  if (err) {
      console.error("Unable to read item. Error JSON:", JSON.stringify(err, null, 2));
  } else {
      console.log("GetItem succeeded:", JSON.stringify(data, null, 2));
  }
}); 

</script>

<?php
echo "Data reading successfully ."
?>

 <!-- /*   $tableName = 'StudentList';


    $key = $marshaler->marshalJson('
    {
        "year": ' . $year . ', 
        "title": "' . $title . '"
    }
    ');

    $params = [
    'TableName' => $tableName,
    'Key' => $key
    ];

try {
    $result = $dynamodb->getItem($params);
    print_r($result["Item"]);

} catch (DynamoDbException $e) {
    echo "Unable to get item:\n";
    echo $e->getMessage() . "\n";
}/*



  /*  function scanAllData($table,$limit){

        $result = $this->getClientdb()->scan(array(
              'TableName' => $table,
              'Limit' => $limit,
              'Select' => 'ALL_ATTRIBUTES'                
           ),
          array('limit' => $limit),
        );
          return $result['Items'];
      }

    $getobj = $this->scanAllData('StudentList','10');

    foreach($getobj as $cols){

            echo $cols['StudentId']['N'];
            echo $cols['CoursesEnrolled']['S'];
    }   */ -->


