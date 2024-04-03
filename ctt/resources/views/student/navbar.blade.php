<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Responsive Navbar</title>
    <style>
      * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
      }

      body {
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
      }

      a {
        text-decoration: none;
        color: rgb(255, 255, 255);
        font-size: 1.2rem;
        font-weight: bold;
        text-transform: uppercase;
      }

      .nav {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-top:10px;
        background-color: #E48310;
      }

      .logo {
        margin-left: 20px;
        width: 168px;
        height: 56px;
        margin-bottom: 8px;
        border-radius: 8px;
      }

      .hamburger {
        padding-right: 20px;
        cursor: pointer;
      }

      .hamburger .line {
        display: block;
        width: 40px;
        height: 5px;
        margin-bottom: 10px;
        background-color: black;
      }

      .nav__link {
        position: fixed;
        width: 94%;
        top: 5rem;
        left: 18px;
        background-color: lightblue;
      }

      .nav__link a {
        display: block;
        text-align: center;
        padding: 10px 0;
      }

      .nav__link a:hover {
        background-color: rgb(255, 255, 255);
        color: #E48310;
      }

      .hide {
        display: none;
      }

      @media screen and (min-width: 600px) {
        .nav__link {
          display: block;
          position: static;
          width: auto;
          margin-right: 20px;
          background: none;
        }

        .nav__link a {
          display: inline-block;
          padding: 15px 20px;
        }

        .hamburger {
          display: none;
        }
      }

      .container {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }
    </style>
  </head>
  <body>
    <header>
      <nav class="nav">
        <img src="4.png" class="logo" alt="no image" >

        <div class="hamburger">
          <span class="line"></span>
          <span class="line"></span>
          <span class="line"></span>
        </div>

        <div class="nav__link hide">
            <a href="{{ route('studentDashboard') }}">Home</a>
            <a href="#">Ranking</a>
            <a href="{{ route('creteria') }}">Criteria</a>
            <a href="{{ route('contactUs') }}">Contact</a>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
        </div>

        <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
            @csrf
        </form>
        </div>
      </nav>
    </header>

    <script>
      const hamburger = document.querySelector('.hamburger');
      const navLink = document.querySelector('.nav__link');

      hamburger.addEventListener('click', () => {
        navLink.classList.toggle('hide');
      });
    </script>
  </body>
</html>
