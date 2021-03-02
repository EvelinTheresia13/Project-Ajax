<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <script type = "text/javascript" src = "js/vue.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <title>Kuis 2</title>
</head>
<body>
    <div id = "app">
       <form>
          <input type="text" v-model="form.name"> 
          <button @click.prevent="add" v-show="!updateSubmit">Add</button>
          <button @click.prevent="Update" v-show="updateSubmit">Update</button>
       </form>
       <ul v-for="(user, index) in users">
          <li>
             <span> {{ user.name }}</span>
             <button @click="Edit(user, index)">Edit</button> || <button>Delete</button>
          </li>

       </ul>     
     </div>
     <script>
        var app = new Vue({
           el: '#app',
           data(){  
              return {
                 users : [
                    {
                       'name' : 'Muhammad Iqbal Mubarok'
                    },
                    {
                       'name' : 'Ruby Purwanti'
                    },
                    {
                       'name' : 'Faqih Muhammad'
                    }
               ],
               updateSubmit : false,
               form : {
                     'name' : ''
               },
               selectedUserId : null,
              }
           },
           methods: {
               add(){
                   this.users.push(
                       this.form 
                   )
                   this.form = {}
               },
               edit(user, index){
                   this.selectedUserId = index
                   this.updateSubmit = true
                   this.form.name = user.name
               },
               update(){
                  this.users[this.selectedUserId].name = this.form.name
                  this.form = {}
                  this.updateSubmit = false
                  this.selectedUserId = null
               }
           }
        });
     </script>
</body>
</html>