<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles

        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway';
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
      -->  
    </head>
    <body>
      <h1>Create task</h1>
      <input type="text" v-model="task" placeholder="Task" />
      <a @click="createTodo()">Save</a>

      <table class="table table-bordered">
        <thead>
            <tr>
                <th>Task</th>
                <th>Done</th>
            </tr>
        </thead>
        <tbody>
            <template v-for="todo in todos">
                <tr>
                    <td>
                        @{{todo.task}}
                    </td>
                    <td>
                        <input type="checkbox" v-model="todo.is_done" />
                    </td>
                </tr>
            </template>
        </tbody>
      </table>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.25/vue.min.js"></script>
     <script src="https://www.gstatic.com/firebasejs/3.3.0/firebase.js"></script>
     <!-- <script src="https://www.gstatic.com/firebasejs/live/3.0/firebase.js"></script> -->

     <script>
         // Initialize Firebase
         var config = {
             apiKey: "{{ config('services.firebase.api_key') }}",
             authDomain: "{{ config('services.firebase.auth_domain') }}",
             databaseURL: "{{ config('services.firebase.database_url') }}",
             storageBucket: "{{ config('services.firebase.storage_bucket') }}",
         };
         firebase.initializeApp(config);

         new Vue({
             el: 'body',

             data: {
                 task: '',
                 todos: []
             },

             ready: function() {
                 var self = this;

                 // Initialize firebase realtime database.
                 firebase.database().ref('todos/').on('value', function(snapshot) {
                     // Everytime the Firebase data changes, update the todos array.
                     self.$set('todos', snapshot.val());
                 });
             },

             methods: {

                 /**
                  * Create a new todo and synchronize it with Firebase
                  */
                 createTodo: function() {
                     var self = this;

                     // For the sake of simplicity, I'm using jQuery here
                     $.post('/todo', {
                         _token: '{!! csrf_token() !!}',
                         task: self.task,
                         is_done: false
                     });

                     this.task = '';
                 }
             }
         });
     </script>

    </body>
</html>
