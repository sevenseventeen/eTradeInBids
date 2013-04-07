<?php 
# SOAP_Hello.php
# Copyright (c) 2009 by Dr. Herong Yang, herongyang.com
# All rights reserved
   $client = new SoapClient("http://www.herongyang.com/Service/Hello_WSDL_11_SOAP.wsdl");
   echo $client->Hello("Hello from client.");
?>




<?php 

phpinfo();

?>