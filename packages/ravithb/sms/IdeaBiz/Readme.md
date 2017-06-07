#IdeaBiz PHP sample

This will handle the API call. and also it handle to token. If need,it will refresh existing token automatically . So you only need to make API call via this SDK

##Configuration
* Make **config.json** and **lib/data.json** writable
* Change config.json files properties based on your application


To get refresh token, you have to use **token api** with username once [ refer Documentation](http://docs.ideabiz.lk/en/Authorization/Authorization%20v1)

## Use
Once config.json is configured, you can include `IdeaBizAPIHandler.php` to your code. then call `sendAPICall` method 

For example

```
include 'IdeaBizAPIHandler.php';
$auth = new IdeaBizAPIHandler();
$out = $auth->sendAPICall($url,RequestMethod::POST,$body);
```

## Parameters
### URL
 complete URL of ideabiz api. Example for sms `https://ideabiz.lk/apicall/smsmessaging/v1/outbound/94777123456/requests`
### Method
 its a HTTP method. you can use `RequestMethod` Enum for that. this accepts string as well such as "POST and "GET". RequestMethod enum contains

```
RequestMethod::POST
RequestMethod::GET
RequestMethod::DELETE
RequestMethod::PUT

```

### Body
this is a plain string that contains any payload. If you need to send an object please `json_encode` it.

```
$out = $auth->sendAPICall($url,RequestMethod::POST,json_encode($obj));

```


## Response
Result returns as array. 

### Success

```
 $result['status'] 
 $result['statusCode'] 
 $result['time']
 $result['header']
 $result['body']

```

#### status 
this contains OK for success

#### Status Code
this contains http status code. eg : 200, 400 like that

#### Time
Time taken to complete the request

#### Headers
HTTP headers that returns by the server

#### Body
body is in plain text. if you have an object, you can use `json_decode` 



### Error
 this happens if connection fails or an error occurs other than the Authentication failures


```
 $result['status'] 
 $result['error'] 
```


#### status 
The string value "ERROR" is given for the Errors

#### error
this contain error description

 
### Exceptions
This returns two types of exceptions if any authentication errors

its
```
AuthenticationException
ConnectionException
```


### Example code
Please refer `test.php`


