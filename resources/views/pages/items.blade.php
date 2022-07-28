<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Index Page</title>

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
            text-decoration: none;
        }
        .card{
            background-color:#EFEFEF;
            box-shadow:0px 5px 5px 0px #c4c4c4;
            display: flex;
            flex-direction: column;
            margin: 20px auto;
            padding: 10px;
            max-width:40%;
        }
        .card-item{
          background-color: white;
          border-radius:7px;
          box-shadow:0px 5px 5px 0px #c4c4c4;
          display: flex;
          flex-direction: column;
          margin: 5px 0px;
          padding: 10px;
        }
        .title{
            background-color: #0C325F;
            color:white;
            margin: 0px;
            padding: 10px 20px;
            text-align: center;
        }
        .text{
          font-size:25px;
        }
        .sub-text{
          color:#959595;
          font-size:25px;
        }
        .btn-delete{
          margin: 3px 0px;
          padding:5px 0px;
          display:flex;
          flex-direction: column;
          justify-content: right;
          text-align: right;
        }
        .btn-style{
          background-color: white;
          border:none;
          color:red;
          cursor:pointer;
          text-decoration:none;
        }
      </style>
  </head>

  <body>
    <h3 class='title'>Data Sampah</h3>
    <div class="card">
      <a class='btn' href='/'>Tambah</a>
      @foreach($items as $item)
        <div class="card-item">
          <p class='text'>{{ $item->name }}</p>
          <div class='btn-delete'>
            <form action="{{ route('deleteDataById', $item->id) }}" type="submit" method='POST' >
              @method('DELETE')
              <button type="submit" class='btn-style'>Hapus</button>
            </form>
          </div>
        </div>
      @endforeach
    </div>
  </body>
</html>