<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mac Calculator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
      body {
        background-color: darkblue;
        display: flex;
        justify-content: center;
        align-items: center;
      }

      input {
        border: none;
        border-radius: 10px;
        padding: 2px 8px;
        margin: 0;
        width: 224px;
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
        font-size: 42px;
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

      .historycal {
        margin: 20px 0px 0px 20px;
      }

      .history-calc::-webkit-scrollbar {
        max-height: 200px;
        overflow-y: hidden;
      }

      #display {
        text-align: right; 
        /* overflow: hidden; */
      /* Mengatur urutan teks dari kanan ke kiri */
        direction: rtl; 
      } 

      #preview {
        padding: 2px 8px;
        font-size: 28px;
      }

      #output {
        border-top-right-radius: 10px;
        border-top-left-radius: 10px;
      }
    </style>
  </head>

  <body>
    <div id="calculator" class="border-radius-10 bg-gray">
      <div id="output" class="bg-gray text-right py-1">
        <input type="text" class="result font-size-50 text-white system-font pr-10" id="display">
        <h3 type="text" class="result font-size-50 text-white system-font pr-10" maxlength="12" id="preview"></h3>
      </div>
      <div id="buttons">
        <div class="flex justify-content-between">
          <button class="btn btn-dark-gray text-white" id="clearAll">AC</button>
          <button class="btn btn-dark-gray text-white" id="backspace"><--</button>
              <button class="btn btn-dark-gray calc-btn oprator text-white">%</button>
              <button class="btn btn-orange calc-btn oprator text-white">/</button>
        </div>
        <div class="flex justify-content-between">
          <button class="btn btn-light-gray calc-btn text-white">7</button>
          <button class="btn btn-light-gray calc-btn text-white">8</button>
          <button class="btn btn-light-gray calc-btn text-white">9</button>
          <button class="btn btn-orange calc-btn oprator text-white">x</button>
        </div>
        <div class="flex justify-content-between">
          <button class="btn btn-light-gray calc-btn text-white">4</button>
          <button class="btn btn-light-gray calc-btn text-white">5</button>
          <button class="btn btn-light-gray calc-btn text-white">6</button>
          <button class="btn btn-orange calc-btn oprator text-white">-</button>
        </div>
        <div class="flex justify-content-between">
          <button class="btn btn-light-gray calc-btn text-white one">1</button>
          <button class="btn btn-light-gray calc-btn text-white two">2</button>
          <button class="btn btn-light-gray calc-btn text-white">3</button>
          <button class="btn btn-orange calc-btn oprator text-white">+</button>
        </div>
        <div class="flex justify-content-between">
          <div class="w-100">
            <button class="btn btn-light-gray calc-btn text-white border-bottom-left-radius-10">0</button>
          </div>
          <div class="flex w-100">
            <button class="btn btn-light-gray calc-btn decimal text-white">.</button>
            <button class="btn btn-orange text-white border-bottom-right-radius-10" id="calculate">=</button>
          </div>
        </div>
      </div>
      <div class="history-calc d-flex flex-column-reverse">
      </div>
    </div>
    <img src="rumus menghitung persen.jpeg" style="height: 542px;" alt="">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
      $(document).ready(function () {
        let input = false

        function updatePreview() 
        {  
          let data    = $("#display").val();
          var regex   = /^\d+%/g;
          var matches = data.match(regex);
          if (data.includes("x")) 
          {
            data = data.replace(/x/g, "*");
          }
          
          if (matches) 
          {
            try
            {
              let data = $("#display").val();
              if (data.includes("x")) {
                data = data.replace(/x/g, "*");
              }
              if (data.includes("%")) {
                data = data.replace("%", "/100");
              }
              if (data !== "") 
              {
                let result = eval(data);
                
                $("#preview").text("=" + result);
              } 
            } catch (error)
            {
            }
          }else if (data !== matches) 
          {
            try 
            {
              if (data.includes("%")) 
              {
                var regex   = /[-+*\/]?\d+%/g;
                var matches = data.match(regex);
                if (matches) {
                  let angka           = [];
                  let operator        = [];
                  let hasilSebelumnya = data.replace(matches, "");

                  for (let match of matches)
                  {
                    let angkaDariPersen = /\d+/.exec(match);
                    angka.push(parseFloat(angkaDariPersen));

                    let opratorDariPersen = /[-+*\/]/.exec(match);
                    operator.push(opratorDariPersen[0]);
                  }
                 
                  let hasilPenjumlahan = eval(eval(hasilSebelumnya) + operator[0] + (eval(hasilSebelumnya) / 100 * angka[0]));

                  hasilSebelumnya = hasilPenjumlahan;
                  $("#preview").text("=" + hasilPenjumlahan);
                }
              } else 
              {
                try 
                {
                  if (data.trim() !== "") 
                  {
                    let result = eval(data);
                    $("#preview").text("=" + result);
                  }else{
                    $("#preview").text("");
                  }
                } catch (error) 
                {
                    }
              }
            } catch (error) 
            {
            }
          }
        }


        $("#calculate").click(function () 
        {
          let data = $('#display').val();
          
          if (data.trim() !== "") 
          {
            $("#display").css("font-size", "28px");
            $("#preview").css({ "font-size": "42px", "font-weight": "500" });
            
            updatePreview();    
            if ($("#display").val().trim() === "") 
            {
              $("#display").val("");
            }
          }
          input = true; 
        });

        $(".history-calc").on("click", ".summation", function () 
        {
          $("#display").val($(this).html().toString());
          updatePreview();
        });
        
        $(".calc-btn").on("click", function () 
        {
          data    = $("#display").val();
          if (input) 
          {
            result  = $("#preview").text();
            if (data !== "") 
            {
              $(".history-calc").append("<div class='historycal'><h3 class='summation text-light'>" + (data.includes("*") ? data.replace("*", "x") : data) +
                "</h3><p class='result text-light'>" + result + "</p></div><hr class='hr text-white'>");
            }
            $("#display").val("");
            $("#preview").text("");
            input = false;
          }
          $("#preview").css({"font-weight": "300", "font-size": "28px"});
          $("#display").css("font-size", "42px");
          let buttonValue = $(this).html();
          let currentDisplayValue = $("#display").val();

          if (buttonValue === "." && data.indexOf(".") === -1) 
          {
            data += ".";
            updatePreview();
          }

          if ($(this).hasClass("oprator") && currentDisplayValue !== "") 
          {
            const lastChar = currentDisplayValue.slice(-1);
            if (lastChar === "+" || lastChar === "-" || lastChar === "x" || lastChar === "/") 
            {
              $("#display").val(currentDisplayValue.slice(0, -1) + buttonValue);
            } else 
            {
              $("#display").val(currentDisplayValue + buttonValue);
            }
          } else 
          {
           $("#display").val(currentDisplayValue + buttonValue);
          }
          updatePreview();
        });

        $("#backspace").click(function () 
        {
          data = $("#display").val().slice(0, - 1)
          $("#display").val(data);

          updatePreview();
        });

        $("#clearAll").click(function ()
        {
          $("#display").val("");
          $("#preview").text("");
          $(".historycal").remove();
          $(".hr").remove();
        });
      });

    </script>
  </body>
</html>