<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Items Page</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            body {
                background-color:#EFEFEF;
                font-family: 'Nunito', sans-serif;
                margin:0px;
            }
            .btn{
                background-color: #30AEE4;
                border: none;
                border-radius:7px;
                box-shadow:0px 10px 10px 0px #c4c4c4;
                color:white;
                margin: 10px 0px;
                padding: 10px 35px;
                text-align: center;
            }
            .card{
                background-color: white;
                box-shadow:0px 10px 10px 0px #c4c4c4;
                margin: 20px auto;
                padding: 10px;
                max-width:40%;
                display: flex;
                flex-direction: column;
            }
            .input-1{
                border: 1px solid black;
                border-radius:5px;
                color:black;
                margin: 5px 0px 10px;
                padding: 10px 20px;
            }
            .input-2{
                border: 1px solid black;
                border-radius:5px;
                margin: 5px 0px 10px;
                padding: 10px 20px;
            }
            .text{
                margin:5px 0px;
            }
            .title{
                background-color: #0C325F;
                color:white;
                margin: 0px;
                padding: 10px 20px;
                text-align: center;
            }
        </style>
    </head>

    <body>
      <h3 class='title'>Input Sampah</h3>
      <form method="POST" action="/api/types">
      @method('POST')
        <div class='card'>
          <label class='text'>Kategori Sampah</label>
          <select class='input-1' type='text' placeholder="Kategori" name="category_id">
            <option value="MAT-001-RES">Plastik</option>
            <option value="MAT-002-PLS">Residu</option>
            <option value="MAT-003-UBC">UBC</option>
            <option value="MAT-004-LOG">Logam</option>
          </select>
          <label class='text'>Nama Sampah</label>
          <input class='input-2' type='text' placeholder="Nama Sampah" name="waste_name"/>
          <button class='btn'>Simpan</button>
        </div>
      </form>
    </body>
</html>
