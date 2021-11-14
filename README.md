# Validator - form validation

# Installation - copy the Validator.php file to the required directory of your site

# Description - this class allows you to check the values entered into the form and transmitted by the POST method. The class also contains methods for checking the extension of uploaded files.

# Examples
All class methods are described as static, so you need to call the required class method as follows, Validator::method ($params). All methods return true on success, otherwise false

<table>
  <th>method</th>
  <th>description</th>
  <th>example</th>
    <tr>
    <td>public static function text ($text, $size=null)</td>
    <td>This method checks the length of the entered text if the number of characters is specified. If the number of characters is not specified, the method returns the text filtered using the filter_var() function</td>
    <td>Validator::text($_POST['name'], 5)</td>
    </tr>
    <tr>
    <td>public static function email ($email)</td>
    <td>This method checks the correctness of the entered email address using the filter_var() function</td>
    <td>Validator::email($_POST['name'])</td>
    </tr>
    <tr>
    <td>public static function pass ($pass, $len)</td>
    <td>This method checks the length of the entered password, the length of the password is set as the second parameter when calling the method.</td>
    <td>Validator::pass($_POST['name'], 6)</td>
    </tr>
    <tr>
    <td>public static function login ($login, $len)</td>
    <td>This method checks the length of the entered login, the length of the login is set by the second parameter when calling the method.</td>
    <td>Validator::login($_POST['name'], 50)</td>
    </tr>
    <tr>
    <td>public static function numberminmax ($number, $min, $max)</td>
    <td>This method checks if the entered number falls within the range of the minimum and maximum values.</td>
    <td>Validator::numberminmax($_POST['name'], 2, 10)</td>
    </tr>
    <tr>
    <td>public static function numbermin ($number, $min)</td>
    <td>This method checks if the entered number is less than the minimum.</td>
    <td>Validator::numbermin($_POST['name'], 2)</td>
    </tr>
    <tr>
    <td>public static function numbermax ($number, $max)</td>
    <td>This method checks if the entered number is greater than the maximum.</td>
    <td>Validator::numbermax($_POST['name'], 20)</td>
    </tr>
    <tr>
    <td>public static function tel ($tel)</td>
    <td>This method is the correctness of the entered phone, it is possible to enter only numbers and signs + and -</td>
    <td>Validator::tel($_POST['name'])</td>
    </tr>
    <tr>
    <td>public static function url ($url)</td>
    <td>This method checks the correctness of the entered URL address using the filter_var() function</td>
    <td>Validator::url($_POST['name'])</td>
    </tr>
    <tr>
    <td>public static function date ($date)</td>
    <td>This method checks that the entered date is correct in yyyy-mm-dd format according to the Gregorian calendar</td>
    <td>Validator::date($_POST['name'])</td>
    </tr>
    <tr>
    <td>public static function file ($file, $type)</td>
    <td>This method checks the extension of the loaded document. Extensions must be specified as the second parameter, separated by commas.</td>
    <td>Validator::file($_FILE['name'])</td>
    </tr>
</table>