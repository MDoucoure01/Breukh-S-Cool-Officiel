<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">

    <title>Breukh'S Cool</title>
  </head>
  <body >
    <div class="global-container" style="height: 100%;align-items: center;display: flex;justify-content: center;color: #0db8de;">
      <div class="card login-form" style="width: 380px;height: 450px;margin: 20px;background: 1a2226;border-radius: 10px;">
        <div class="card-body">
          <h1 class="card-title text-center" style="font-weight: 900;padding-top: 20px;">Login</h1>
          <div class="card-text">
            <form action="/Connexion/Connexion" method="post" style="padding-top: 10px;font-size: 14px;margin-top: 30px;">
              
              <label for="ExempleInputEmail1">phone</label>
              <input name="phone" type="text" class="form-control form-control-sm" id="ExempleInputEmail1" style="background: #1a2226;border:2px solid #0db8de; border-radius: 10px; margin-bottom: 25px;color: white;">
              
              <label for="ExempleInputpassword1">password</label>
              <input name="password" type="password" class="form-control form-control-sm" id="ExempleInputpassword1" style="background: #1a2226;border:2px solid #0db8de; border-radius: 10px; margin-bottom: 25px;color: white;">

              <button type="submit" class="btn btn-primary btn-block" style="background: #0db8de;font-size: 14px;transform: translateY(10px);border-radius: 10px;">Sign In</button>

              <div class="signup" style="text-align: center;padding-top: 25px;">Don't have an account?</div> <a href="#">Create One</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>