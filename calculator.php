<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mac Calculator</title>
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    input {
      border: none;
      padding: 2px 8px;
      margin: 0;
      width: 224px;
      text-align: right;
      background-color: rgb(91, 86, 82);
    }

    #calculator {
      width: 240px;
      height: 100%;
      border: solid 0.5px black;
      box-shadow: 0px 12px 68px -2px black;
    }

    .red {
      background-color: rgb(238, 105, 94);
    }

    .yellow {
      background-color: rgb(245, 189, 79);
    }

    .green {
      background-color: rgb(98, 195, 84);
    }

    .circle {
      border-radius: 50%;
    }

    .h-15 {
      width: 15px;
      height: 15px;
    }

    .flex {
      display: flex;
    }

    .bg-gray {
      background-color: rgb(91, 86, 82);
    }

    .px-5 {
      padding-left: 5px;
      padding-right: 5px;
    }

    .py-5 {
      padding-top: 5px;
      padding-bottom: 5px;
    }

    .mr-5 {
      margin-right: 5px;
    }

    .border-radius-10 {
      border-radius: 10px;
    }

    .text-right {
      text-align: right;
    }

    .text-white {
      color: white;
    }

    .font-size-50 {
      font-size: 50px;
    }

    .system-font {
      font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
      font-weight: 200;
    }

    .justify-content-between {
      justify-content: space-between;
    }

    .btn {
      width: 100%;
      padding: 10px;
      font-size: 20px;
      border: solid 0.5px rgb(91, 86, 82);
    }

    .btn-dark-gray {
      background-color: rgb(106, 103, 100);
    }

    .btn-orange {
      background-color: rgb(243, 162, 60);
    }

    .btn-light-gray {
      background-color: rgb(131, 128, 125);
    }

    .w-100 {
      width: 100%;
    }

    .border-bottom-left-radius-10 {
      border-bottom-left-radius: 10px;
    }

    .border-bottom-right-radius-10 {
      border-bottom-right-radius: 10px;
    }
  </style>
</head>

<body>
  <div id="calculator" class="border-radius-10 bg-gray">
    <div id="header" class="flex bg-gray px-5 border-radius-10 py-5">
      <div class="circle red h-15 mr-5"></div>
      <div class="circle yellow h-15 mr-5"></div>
      <div class="circle green h-15 mr-5"></div>
    </div>
    <div id="output" class="bg-gray text-right py-5">
      <input type="text" class="result font-size-50 text-white system-font pr-10" id="display" value="0" max="8">
    </div>
    <div id="buttons">
      <div class="flex justify-content-between">
        <button class="btn btn-dark-gray text-white" id="clearAll">AC</button>
        <button class="btn btn-dark-gray text-white" id="plus-minus">+/-</button>
        <button class="btn btn-dark-gray operator text-white">%</button>
        <button class="btn btn-orange operator text-white">/</button>
      </div>
      <div class="flex justify-content-between">
        <button class="btn btn-light-gray number text-white">7</button>
        <button class="btn btn-light-gray number text-white">8</button>
        <button class="btn btn-light-gray number text-white">9</button>
        <button class="btn btn-orange operator text-white">x</button>
      </div>
      <div class="flex justify-content-between">
        <button class="btn btn-light-gray number text-white">4</button>
        <button class="btn btn-light-gray number text-white">5</button>
        <button class="btn btn-light-gray number text-white">6</button>
        <button class="btn btn-orange operator text-white">-</button>
      </div>
      <div class="flex justify-content-between">
        <button class="btn btn-light-gray number text-white one">1</button>
        <button class="btn btn-light-gray number text-white two">2</button>
        <button class="btn btn-light-gray number text-white">3</button>
        <button class="btn btn-orange operator text-white">+</button>
      </div>
      <div class="flex justify-content-between">
        <div class="w-100">
          <button class="btn btn-light-gray number text-white border-bottom-left-radius-10">0</button>
        </div>
        <div class="flex w-100">
          <button class="btn btn-light-gray decimal text-white">.</button>
          <button class="btn btn-orange text-white border-bottom-right-radius-10" id="calculate">=</button>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function () {

      let userInput = '';
      let opratorInput = '';
      let memory = 0;

      function display() {
        $("#display").val(userInput);
      }

      $(".number").click(function () {
        userInput += $(this).text();
        display();
      });

      $(".operator").click(function () {
        if (userInput !== '') {
          memory = parseFloat(userInput);
          userInput = '';
          opratorInput = $(this).text();
          display();
        }
      });

      $(".decimal").click(function () {
        userInput += $(this).text();
        display();
      });

      $("#plus-minus").click(function () {
        userInput = parseFloat(userInput * -1).toString();
        display();
      });

      $("#clearAll").click(function () {
        userInput = '';
        opratorInput = '';
        memory = 0;
        display();
      });

      $("#calculate").click(function () {
        if (userInput !== '') {
          let input2 = parseFloat(userInput);
          switch (opratorInput) {
            case "+":
              memory += input2;
              break;
            case "-":
              memory -= input2;
              break;
            case "x":
              memory *= input2;
              break;
            case "/":
              memory /= input2;
              break;
            case "%":
              memory %= input2;
              break;
          }
          userInput = memory;
          display();
        }
      });
    });
  </script>
</body>

</html>