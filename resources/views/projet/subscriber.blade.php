@extends('layouts.app')


<div class="container" style="border: 1px solid green;margin-top: 100px">
    <div class="row justify-content-lg-center">
               <h3>
               	    Paiement Subscription 
               </h3>
    </div>

    <hr/>

 	<div class="row">

 		<div class="col-lg-7">
           <table class="table table-hover">
           	    <tbody>
           	    	 <tr>
           	    	    <th>Nom du projet</th>
           	    	    <td>{{$subscribe['name']}}</td>
           	    	    <td></td><td></td><td></td><td></td>
           	    	 </tr>
           	    	 <tr>
           	    	    <th>Nombre d'actions</th>
           	    	    <td>{{$subscribe['montant']/10000}}</td>
           	    	    <td></td><td></td><td></td><td></td>
           	    	 </tr>
           	    	 <tr>
           	    	    <th>Status</th>
           	    	    <td>En attente</td>
           	    	    <td></td><td></td><td></td><td></td>
           	    	 </tr>
           	    	 <tr>
           	    	    <th>Date de souscription</th>
           	    	    <td>
           	    	    	{{Carbon\Carbon::today()->format('d/m/Y')}}
           	    	    </td>
           	    	    <td></td><td></td><td></td><td></td>
           	    	 </tr>
           	    	 <tr>
           	    	 	<td></td><td></td><td></td><td></td>
           	    	    <th>Montant du paiement</th>
           	    	    <td>
           	    	    	{{$subscribe['montant']}} XAF
           	    	    </td>
           	    	    <input type="hidden" id="country" value="{{$subscribe['pays']}}">
                        <input type="hidden" id="email" value="{{$subscribe['email']}}">
                        <input type="hidden" id="comment" value="{{$subscribe['comment']}}">
                         <input type="hidden" id="montant" value="{{$subscribe['montant']}}">
                         <input type="hidden" id="project_id" value="{{$subscribe['id']}}">
                         <input type="hidden" id="phone" value="{{$subscribe['phone']}}">
                         <input type="hidden" id="b_postal" value="{{$subscribe['postal']}}">
           	    	 </tr>
           	    </tbody>
           </table>
 	    </div>

 	    <div class="col-lg-5" id="blocus">
 	    	<div class="col-lg-10 offset-lg-1 box_paiement" id="block_mtn"><div class="row">
 	    	  <div class="col-lg-9 form-check offset-lg-1">
 	    	  	 <input class="form-check-input" type="radio" name="radios" id="mtnRadio" value="mtn" state="0">
                 <label class="form-check-label" for="mtnRadio">
                      MTN Mobile Money
                 </label>
 	    	  </div>
 	    	  <div class="col-lg-2">
 	    	  	 <img src="{{asset('public/img/mtn_momo.jpg')}}"
                    class="img-fluid paiement_image">
 	    	  </div>
 	        </div></div>

 	        <div class="col-lg-10 offset-lg-1 box_paiement" id="block_orange"><div class="row">
 	    	  <div class="col-lg-9 form-check offset-lg-1">
 	    	  	 <input class="form-check-input" type="radio" name="radios" id="orangeRadio" value="orange" state="0">
                 <label class="form-check-label" for="orangeRadio">
                      ORANGE Money
                 </label>
 	    	  </div>
 	    	  <div class="col-lg-2">
 	    	  	  <img src="{{asset('public/img/orange_money.jpg')}}"
                    class="img-fluid paiement_image" id="">
 	    	  </div>
 	       </div>
 	    </div></div>
 	</div>

</div>

@section('content')
 <script>
     	  $(function(){
              
              $('input[type="radio"]').on('click',function(){

                 var state = $(this).attr('state');
                 var value = $(this).val();
                 

                 if(state == 0)
                 {
                 	var position = $('#blocus').offset();
                    $('<div id="la_volee"></div>').appendTo('body');
                    $('#la_volee').offset({top:position.top,left:position.left});

              	    $('#la_volee').animate({
              	 	 'opacity':0.5,
              	 	 'height':$('#blocus').height()-60,
              	 	 'width':$('#blocus').width()-2,

              	 	
              	    },1000,function(){
              	    /* remettre l'etat des boutons à 1 pour qu'on 
              	            puisse à nouveau cliquer*/
              	      if(value == 'mtn')
              	      {
              	      	$('#mtnRadio').attr('state','1');
              	      	$('#btn_orange').remove();
              	      } 
                      else{
                      	$('#orangeRadio').attr('state','1');
                      	$('#btn_mtn').remove();
                      } 

                       setTimeout(function(){
                     	$('#la_volee').animate({
                     		'opacity':0
                     	},1000,function(){
                     		$(this).css("display", "none");
                            $(this).remove();

                        /*ajout du bouton de paiement avec une animation*/
                       if(value == 'mtn')
                       {
                         $('<button id="btn_mtn">Valider</button>').appendTo('#block_mtn');
                         
                         $('#btn_mtn').animate({
              	 	        'height':40,
              	 	        'opacity':1,
              	 	        'width':80,

              	            },1000,function(){
                            
              	            }).addClass('offset-lg-4');

                             $('#btn_mtn').on('click',function(){

                             $(this).html('Patienter...')

                             setTimeout(function(){
                               $('#btn_mtn').html('Valider');
                             },3000);

                               var project_id = $('#project_id').val();
                               var montant = $('#montant').val();
                               var country = $('#country').val();
                               var email = $('#email').val();
                               var phone = $('#phone').val();
                               var comment = $('#comment').val();
                               var boite_p = $('#b_postal').val();
                               var moyen_paiement = "mtn";
                               var _token = $('[name="_token"]').val();
                               

                               traitement_en_cours(project_id,montant,moyen_paiement,country,boite_p,phone,comment,email,_token);
                             })

                       }else
                       {
                         $('<button id="btn_orange">Valider</button>').appendTo('#block_orange');
                         
                         $('#btn_orange').animate({
              	 	        'height':40,
              	 	        'opacity':1,
              	 	        'width':80,

              	            },1000,function(){
                            
              	            }).addClass('offset-lg-4');

                           $('#btn_orange').on('click',function(){

                             $(this).html('Patienter...')

                             setTimeout(function(){
                               $('#btn_orange').html('Valider');
                             },3000);

                               var project_id = $('#project_id').val();
                               var montant = $('#montant').val();
                               var country = $('#country').val();
                               var email = $('#email').val();
                               var phone = $('#phone').val();
                               var comment = $('#comment').val();
                               var boite_p = $('#b_postal').val();
                               var moyen_paiement = "orange";
                               var _token = $('[name="_token"]').val();
                               

                               traitement_en_cours(project_id,montant,moyen_paiement,country,boite_p,phone,comment,email,_token);
                             });
                       }

                     	});
                     },1000);

               
              	 })
                
                 }

              })

              $('input[type="radio"]').on('blur',function(){
              	$(this).attr('state','0');
              })

             
              
     	  })

     	  function traitement_en_cours(project_id,montant,moyen_paiement,country,boite_p,phone,comment,email,_token)
     	  {
                 
     	  	var xhr = getXMLHttp();
            var url = "{{ URL::route('project.donation') }}";
           
            xhr.onreadystatechange = function()    
               {
                 if(xhr.readyState == 4)
                    {    
                    if(xhr.status == 200)
                        {
                           var info = xhr.responseText;
                           //var json = eval('('+info+')');
                           setTimeout(function() {
                              toastr.success('Un mail a été envoyé à votre adresse' , 'Success Alert', {timeOut: 5000});
                            }, 500);
                            
                            
                        }
                    }     
                }

            xhr.open("POST", url , true);
            xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            xhr.send("project_id="+project_id+"&email="+email+"        &montant="+montant+"&moyen="+moyen_paiement+"        &country="+country+"&boite_p="+boite_p+"&comment="        +comment+"&phone="+phone+"&_token="+_token);
     	  
     	  }
 </script>
@endsection