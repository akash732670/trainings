<!DOCTYPE html>
<html>
<head>
  <title>Javascript</title>
</head>
<body>

  <label>Enter First Number: </label>

  <input type="text" name="firstNumber" id="firstNumber">

  <label>Enter Second Number</label>

  <input type="text" name="secondNumber" id="secondNumber">

  <label>Operation</label>
  <select id="Operation">
      
    <option value="+">+</option>
    <option value="-">-</option>
    <option value="*">*</option>
  </select>
  <button id="Calculate" onclick="calculte();">Calculate</button>

  <h2 style="text-align: center;" id="result"></h2>

  <script type="text/javascript">
    /*var a  = 5;
    var b = 6;
    var c;

    if (a>b) {

      document.getElementById('result').innerHTML = "hello";

    } else {
      document.getElementById('result').innerHTML = "hii";
    }*/

    function calculte() {

      var a = parseInt(document.getElementById("firstNumber").value);

      var b = parseInt(document.getElementById("secondNumber").value);

      var operation = document.getElementById("Operation").value;

      /*alert(operation);*/

      var c;

      if (isNaN(a) && isNaN(b)) {

        alert("Number can't be blank");

      } else {



      switch(operation) {

        case "+":
          c= a+b;
          document.getElementById("result").innerHTML = "result " + " -  "+ c;

          document.getElementById("result").style.color = "red";

          break;

        case "-":
          c= a-b;
          document.getElementById("result").innerHTML = "result " + " -  "+ c;    
          break;


        case "*":
          c= a*b;
          document.getElementById("result").innerHTML = "result " + " -  "+ c;    
          break;


      }

      }

      console.log(a+b);

      

    }

var fruits = ["apple", "orange", "cherry"];
fruits.forEach(myFunction);

function myFunction(item, index) {
  document.getElementById("demo").innerHTML += index + ":" + item + "<br>";
}

  </script>
</body>
</html>