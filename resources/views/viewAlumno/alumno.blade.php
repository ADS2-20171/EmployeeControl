@extends('layouts.principal')



@section('content')
    
    <div id='app'>
    @if(Auth::user()->name)
                        <div v-for="va in viewalumnos">
                            <span class="block m-t-xs"> 
                                <center><h2><strong class="font-bold">${va.alumno_nombres},${va.alumno_apellidos}</strong></h2></center>
                            </span>
                        </div>
     @endif 
    </div>
    

    
    <script>
    new Vue({
        delimiters:['${','}'],
        data:function(){
                return {
                    viewalumnos:[],
                    viewalumno:{},
                 }
              },

        methods:{
            RegistrarAsistencia:function(){
                axios.post('/AcademicSystem/public/api/viewalumno',this.alumno).then(function(data){
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
            axios.get('/AcademicSystem/public/api/viewalumno').then(function(data){
                    this.viewalumnos=data.data;
                    console.log(data);
            }.bind(this))
        }

       }).$mount('#app')

    </script>


@stop