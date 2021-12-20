<html>
<body>
<form method = "post">
   <table>
      <tr>
        <td><label>Enter the year</label></td>
        <td><select name = "year">
            <option value = "1901">1901</option>
            <option value = "1902">1902</option>
            <option value = "1903">1903</option>
            <option value = "1904">1904</option>
            <option value = "1905">1905</option>
            <option value = "1906">1906</option>
            <option value = "1907">1907</option>
            <option value = "1908">1908</option>
            <option value = "1909">1909</option>
            <option value = "1910">1910</option>
            <option value = "1911">1911</option>
            <option value = "1912">1912</option>
            <option value = "1913">1913</option>
            <option value = "1914">1914</option>
            <option value = "1915">1915</option>
            <option value = "1916">1916</option>
            <option value = "1917">1917</option>
            <option value = "1918">1918</option>
            <option value = "1919">1919</option>
            <option value = "1920">1920</option>
            <option value = "1921">1921</option>
            <option value = "1922">1922</option>
            <option value = "1923">1923</option>
            <option value = "1924">1924</option>
            <option value = "1925">1925</option>
            <option value = "1926">1926</option>
            <option value = "1927">1927</option>
            <option value = "1928">1928</option>
            <option value = "1929">1929</option>
            <option value = "1930">1930</option>
            <option value = "1931">1931</option>
            <option value = "1932">1932</option>
            <option value = "1933">1933</option>
            <option value = "1934">1934</option>
            <option value = "1935">1935</option>
            <option value = "1936">1936</option>
            <option value = "1937">1937</option>
            <option value = "1938">1938</option>
            <option value = "1939">1939</option>
            <option value = "1940">1940</option>
            <option value = "1941">1941</option>
            <option value = "1942">1942</option>
            <option value = "1943">1943</option>
            <option value = "1944">1944</option>
            <option value = "1945">1945</option>
            <option value = "1946">1946</option>
            <option value = "1947">1947</option>
            <option value = "1948">1948</option>
            <option value = "1949">1949</option>
            <option value = "1950">1950</option>
            <option value = "1951">1951</option>
            <option value = "1952">1952</option>
        </select></td>
      </tr>
      <tr>
        <td><input type = "submit" name = "submit" value = "check"></td>
      </tr>
   </table>
</form>

<?php 
  if(isset($_POST['submit'])) {
      $year = $_POST['year'];

      if($year%4 == 0) {
          $message = 'this is a leap year';
      }
      else {
          $message = 'this is not a leap year';
      }
?>
<p><?php echo $message ?></p>
<?php 
  }
?>
</body>
</html>