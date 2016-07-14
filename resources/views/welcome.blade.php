<!DOCTYPE html>
<html>
<head>
  <title>Broadcast</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body id="app">
  <div class="container">
    <h1 class="page-header">List of New Users</h1>

    <ul>
      <li v-for="user in users">@{{ user.name }} <@{{ user.email }}></li>
    </ul>

    {{--<pre>--}}
      {{--@{{ $data | json }}--}}
    {{--</pre>--}}
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.4.8/socket.io.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js"></script>
  <script>
    var socket = io('{{ env('APP_URL') }}' + ':8082');

    new Vue({
      el: '#app',

      data: {
        users: []
      },

      ready: function () {
        socket.on('whik:App\\Events\\NewUserCreated', function (data) {
          this.users.push(data.user);
        }.bind(this));
      }
    });
  </script>
</body>
</html>
