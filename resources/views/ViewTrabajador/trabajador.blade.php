@extends('layouts.principal')



@section('content')
    
    <div id='app'>

                        <div v-for="vt in viewTrabajadores">
                            <span class="block m-t-xs"> 
                                <center><h2><strong class="font-bold">${vt.trabajador_nombres},${vt.trabajador_apellidos}</strong></h2></center>
                            </span>
                        </div>
    </div>
    

    
    <script>
    new Vue({
        delimiters:['${','}'],
        data:function(){
                return {
                    viewTrabajadores:[],
                    viewTrabajador:{},
                 }
              },

        methods:{
            RegistrarAsistencia:function(){
                axios.post('/AcademicSystem/public/api/viewTrabajador',this.alumno).then(function(data){
                    Push.create('Asistencia Registrada! ',{
                        icon: '{{asset('img/icon.png')}}',
                        timeout: 4000,
                        onClick: function () {
                            window.focus();
                            this.close();
                        }
                    });
                    this.alumnos.push(clone);
                }.bind(this))
            }

        },

        mounted:function(){
            axios.get('/AcademicSystem/public/api/viewTrabajador').then(function(data){
                    this.viewTrabajadores=data.data;
                    console.log(data);
            }.bind(this))
        }

       }).$mount('#app')

    </script>


@stop