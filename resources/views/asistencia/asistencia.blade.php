@extends('layouts.principal')



@section('content')
    
    <div id='app'>

    <header>
        <center>
            <div>
            <section style="padding: 20px">
                <i class="fa fa-graduation-cap fa-5x" aria-hidden="true"></i><h2><b>Marcar Asistencia</b></h2>
            </section>
            </div>
        </center>
    </header>

    <div id="content">
        <section id="widget-grid">
            <div class="row" id="form-full">
                <article class="col-sm-12 col-md-12 col-lg-8" id="formulario">
                    <div class="col-md-6">
                        <center>
                             <i class="fa fa-clock-o fa-5x" aria-hidden="true"></i><br>
                             <span id="liveclock"></span>
                        </center>
                    </div>
                    <div class="widget-body">
                        <form class="smart-form" name="form" @submit.prevent="RegistrarAsistencia">
                        <fieldset>
                               <div class="row">
                               <section class="col col-10">
                                   <label><h4>Ingrese el Número de DNI para registrar su asistencia en el Sistema Academico</h4></label><br><br>
                                    <input type="text" class="form-control"  v-on:keyup.enter="submit" id="asistencia" name="asistencia" v-model="asistencia.codigo" placeholder="Digite su Código">
                                    <div class="modal-footer">
                                        <button class="btn btn-primary"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> Registrar</button>
                                    </div>
                               </section>
                           </div>
                        </fieldset>
                        </form>
                    </div>
                </article>
            </div>
        </section>
    </div>

    </div>
    

    
    <script>


    function show5(){
        if (!document.layers&&!document.all&&!document.getElementById)
        return

         var Digital=new Date()
         var hours=Digital.getHours()
         var minutes=Digital.getMinutes()
         var seconds=Digital.getSeconds()

        var dn="PM"
        if (hours<12)
        dn="AM"
        if (hours>12)
        hours=hours-12
        if (hours==0)
        hours=12

         if (minutes<=9)
         minutes="0"+minutes
         if (seconds<=9)
         seconds="0"+seconds
        //change font size here to your desire
        myclock="<font size='5' face='Arial' ><b><font size='1'>Hora actual:</font></br>"+hours+":"+minutes+":"
         +seconds+" "+dn+"</b></font>"
        if (document.layers){
        document.layers.liveclock.document.write(myclock)
        document.layers.liveclock.document.close()
        }
        else if (document.all)
        liveclock.innerHTML=myclock
        else if (document.getElementById)
        document.getElementById("liveclock").innerHTML=myclock
        setTimeout("show5()",1000)
         }


        window.onload=show5,
         //-->
     
    new Vue({
        delimiters:['${','}'],
        data:function(){
                return {
                    asistencias:[],
                    asistencia:{},
                 }
              },

        methods:{
            RegistrarAsistencia:function(){
                axios.post('/AcademicSystem/public/api/asistencia',this.asistencia).then(function(data){
                    if (data.data.status === 'success') {
                          Push.create('Asistencia Registrada! ',{
                                icon: '{{asset('img/icon.png')}}',
                                timeout: 4000,
                                onClick: function () {
                                    window.focus();
                                    this.close();
                                }
                            });
                        } else {
                           Push.create('Error! Digite Correctamente el Codigo!!... ',{
                                icon: '{{asset('img/icon.png')}}',
                                timeout: 4000,
                                onClick: function () {
                                    window.focus();
                                    this.close();
                                }
                            });
                        }

                    console.log(data);
                    this.asistencias.push(clone);
                }.bind(this))
            }

         }
    }).$mount('#app')/*,

        mounted:function(){
            axios.get('/AcademicSystem/public/api/asistencia').then(function(data){
                    this.asistencias=data.data;
                    console.log(data);
            }.bind(this))
        }

       }).*/

    </script>


@stop