@extends('layouts.app')

@section('content')
   
     <div class="container">
        
        <div class="row justify-content-lg-center" style="margin-top: 100px">
               <h1>
               	    {{$projet->nom_du_projet}}
               </h1>
        </div>
        
         <div class="row justify-content-lg-center">
              <h6> {{$categorie}}</h6>
        </div>

     	<div class="row py-3">
              <div class="col-lg-6">
                  <img src="{{asset('public/img/projets/logo/images/'. $projet->photo_projet)}}" width="100%" height="100%" alt="image du projet">  
              </div>
              <div class="col-lg-6 py-5" style="border: 2px solid black;">
                    <div class="row">
                    	<div class="col-lg-2">
                    		<img src="{{asset('public/img/projets/logo/images/'.$projet->photo_projet)}}" width="50" height="50" alt="image de profil" class="image rounded-circle">
                    	</div> 
                    	<div class="col-lg-1">
                            <div class="row"><a href="#">profil<a></div>
                            <div class="row">Paris</div>
                    	</div>

                    </div>
                    <div class="row px-3 py-4">
                    	<div class="col-lg-3">
                    		<div class="row"><strong style="font-size: 18px">271</strong></div>
                    		<div class="row">contributeurs</div>
                    	</div>
                    	<div class="col-lg-3">
                    		<div class="row">
                    			<strong style="font-size: 18px">
                    			  {{ $diff = Carbon\Carbon::parse($projet->date_fin_mise_en_oeuvre)->diffInDays() }}      
                    			</strong>
                    		</div>
                    		<div class="row">jours</div>
                    	</div>
                    	<div class="col-lg-3">
                    		<div class="row">
                    			<strong style="font-size: 18px">
                    				{{ $projet->somme_recoltee }} 
                    			</strong>
                    		</div>
                    		<div class="row">
                    			sur {{ $projet->somme_a_recolter }}
                    		</div>
                    	</div>
                    	<div class="col-lg-3"></div>
                    </div>
                    
                    <div class="row">
                      <div class="col-lg-10 px-3">
                      	<div class="progress">
                          <div class="progress-bar progress-bar-success" role="progressbar" style="width: {{$pourcentage}}%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">{{$pourcentage}}%</div>
                        </div>
                      </div> 
                    </div>

                    <div class="row">
                    	<div class="col-lg-10 px-3 py-4 btn-lg">
                    		<a href="{{route('project.soutenir',[$projet->id,$projet->nom_du_projet])}}" class="badge badge-primary" style="width: 100%;height: 150%;padding-top: 5%;font-size: 25px">Je soutiens</a>
                    	</div>
                    </div>  
              </div>      
        </div>

        <div class="row">
              <div class="col-lg-6">
                   <p id="description">
                        This text should overflow the parent.ffjfjfjfjfjfjfjf jvjfjfjfjfj ffffffffff ffffffffffffffffffffffff ffffffffffff fffff fffffffffff fffffff ffffff fffffffffffffffff ffffffffffffffffffffff ffffffffffff fffffffffffff ffffffffff ffffffffff ffffffffffffffffffffffffffk lekkeoeoi popzzo pozpozieieoiu izieoz zozoiz izizzizoizziz ozizuzuzizpoaiaisbidiu ejieeiueuvi ioioaioaooazi zuuz
                   </p>
              </div>
              <div class="col-lg-6" style="border: 2px solid red;">
                 <div class="row px-3">
                 	<p id="suivre">Suivre et partager</p>
                 </div> 
                 <div class="col-lg-8">
                 	<ul class="list-inline">
                      <li class="list-inline-item">
                      	<img src="{{asset('public/svg/facebook.svg')}}"     alt="image Facebook" height="60px" width="     50px" id="facebook" 
                             data-shareurl="{{url()->current()}}"
                             style="cursor: pointer;" 
                        />
                      </li>
                      <li class="list-inline-item">
                      	 <img src="{{asset('public/svg/twitter.svg')}}"     alt="image Twitter" height="60px" width="     50px" id="twitter"
                              data-shareurl="www.apesafund.com"
                              style="cursor: pointer;" 
                         />
                      </li>
                      <li class="list-inline-item">
                      	 <img src="{{asset('public/svg/linkedin.svg')}}" 
                              alt="image Linkedin" height="60px" width="50px" id="linkedin"
                              data-shareurl="{{url()->current()}}"
                              style="cursor: pointer;" 
                         />
                      </li>   
                    </ul>
                 </div>
                 
              </div>

          @auth

           <div class="container">
              <ul class="nav nav-pills mb-3 py-4 justify-content-center " id="pills-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Documents</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Contributions<span class="badge badge-pill badge-success">{{$donation}}</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Commentaires<span class="badge badge-pill badge-success">{{$comments}}</span></a>
                  </li>
              </ul>
              <div class="row" style="border:2px solid black">
                <div class="tab-content col-lg-6" id="pills-tabContent">
                  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"> 
                    <h3>Documents</h3>
                    <table class="table table-hover">
                       <tbody>
                           <tr>
                             <td>
                               <a href="{{asset('storage/public/file/projets/resultats_finaux/'.$projet->planning)}}">planning du projet</a>
                             </td>
                           </tr>
                           <tr>
                             <td>
                                <a href="{{asset('storage/public/file/projets/resultats_finaux/'.$projet->resultats_finaux)}}">resultats finaux du projet</a>
                             </td>
                           </tr>
                       </tbody>
                    </table>
                  </div>
                  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">text should overflow the parent.ffjfjfjfjfjfjfjf jvjfjfjfjfj ffffffffff ffffffffffffffffffffffff ffffffffffff fffff fffffffffff fffffff ffffff fffffffffffffffff ffffffffffffffffffffff ffffffffffff fffffffffffff ffffffffff ffffffffff ffffffffffffffffffffffffffk lekkeoeoi popzzo pozpozieieoiu izieoz zozoiz izizzizoizziz ozizuzuzizpoaiaisbidiu ejieeiueuvi ioioaioaooazi zuuzf</div>
                  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">text should overflow the parent.ffjfjfjfjfjfjfjf jvjfjfjfjfj ffffffffff ffffffffffffffffffffffff ffffffffffff fffff fffffffffff fffffff ffffff fffffffffffffffff ffffffffffffffffffffff ffffffffffff fffffffffffff ffffffffff ffffffffff ffffffffffffffffffffffffffk lekkeoeoi popzzo pozpozieieoiu izieoz zozoiz izizzizoizziz ozizuzuzizpoaiaisbidiu ejieeiueuvi ioioaioaooazi zuuz</div>
                </div>

                <div class="col-lg-6" style="border:2px solid yellow;">

                   <div class="col-lg-6 offset-lg-3 div_souscripteur">
                     Dernieres souscriptions
                   </div>
                   @foreach($last_donation as $element)
                   <div class="col-lg-6 offset-lg-3 liste_sous_recents">
                       <div class="media">
                          <img class="align-self-start mr-3" src="../64x64" alt="Generic" style="width:60px;">
                          <div class="media-body">
                              <h5 class="mt-0 font-weight-bold"> {{$element->name}}</h5>
                              <p class="mb-0 texte" style="color: green;">
                                   XAF{{$element->montant}}</p>
                              <p class="mb-0">                  {{$element->commentaire}}
                              </p>

                              <p>
                                <small class="font-italic btn-block text-muted"> il y'a {{$diff = Carbon\Carbon::parse($element->date)->diffInDays()}} jours</small>
                              </p>

                          </div>
                       </div>
                   </div>
                   @endforeach
                   <div class="col-lg-6 offset-lg-3 liste_sous_recents">
                     Le pays va mal
                   </div>

                </div>
              </div>
            </div>
           
          @endauth  
        </div>


                    
     </div>

     <script>
     	  $(function(){
           $('#facebook').on('click',function(){
              var shareurl = $(this).data('shareurl');
              window.open('https://www.facebook.com/sharer/sharer.php?u='+escape(shareurl)+'&t='+document.title, '', 
              'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');
              return false;
           });

           $('#linkedin').on('click',function(){
            
              var shareurl = $(this).data('shareurl');
              window.open('https://www.linkedin.com/shareArticle?min=true&url='+escape(shareurl)+'&title='+document.title+'&summary=www.apesafund.com', 
              'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');
              return false;
           });


     	  })
     </script>
@endsection