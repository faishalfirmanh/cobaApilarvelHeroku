<html>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
  </head>
    <style>
      body {
        text-align: center;
        padding: 40px 0;
        background: #EBF0F5;
      }
        h1 {
          color: #88B04B;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-weight: 900;
          font-size: 40px;
          margin-bottom: 10px;
        }
        p {
          color: #404F5E;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-size:20px;
          margin: 0;
        }
      i {
        color: #9ABC66;
        font-size: 100px;
        line-height: 200px;
        margin-left:-15px;
      }
      .card {
        background: white;
        padding: 60px;
        border-radius: 4px;
        box-shadow: 0 2px 3px #C8D0D8;
        display: inline-block;
        margin: 0 auto;
      }
      .buttonClas{
          margin-top: 20px;
          background-color: rgba(60, 60, 245, 0.926);
          width: 130px;
          height: 40px;
          border-radius: 8px;
          color: white;
      }
      .buttonClas:hover{
        margin-top: 20px;
          background-color:rgb(103, 103, 226);
          width: 130px;
          height: 40px;
          border-radius: 8px;
          color: white;
      }
    </style>
    <body>
      <div class="card">
      <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
        <i class="checkmark">✓</i>
      </div>
        <h1>Success</h1> 
        <p>Checkout Trevelling<br/> Happy Holiday</p>
        <form action="{{url('/Travel')}}" >
          <button class="buttonClas">
            Back home
         </button>
        </form>
      </div>
    </body>
</html>